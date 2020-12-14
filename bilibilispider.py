import json
from bs4 import BeautifulSoup
import pymysql
import requests
import js2xml
import lxml
id=100001
videoid=100001
headers = {
    'authority': 'api.bilibili.com',
    'sec-ch-ua': '"Google Chrome";v="87", " Not;A Brand";v="99", "Chromium";v="87"',
    'accept': 'application/json, text/plain, */*',

    'user-agent': 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36',
    'sec-fetch-site': 'same-site',
    'sec-fetch-mode': 'cors',
    'sec-fetch-dest': 'empty',
    'referer': 'https://www.bilibili.com/',
    'accept-language': 'zh-CN,zh;q=0.9,en;q=0.8,zh-TW;q=0.7',
}
db = pymysql.connect("localhost","root","","web_design" )

# db = pymysql.connect("47.115.15.18","wangyesheji","e7BLUzfQv69wXybN","web_design" )

cursor = db.cursor()
def getlie(page):
    url="https://bangumi.bilibili.com/media/web_api/search/result?season_version=-1&area=-1&is_finish=-1&copyright=-1" \
        "&season_status=-1&season_month=-1&pub_date=-1&style_id=-1&order=3&st=1&sort=0&page={}&season_type=1".format(
        page)
    lie = requests.get(url,headers)
    return lie

def zhou(update):
    if(update.find("周一")!=-1):
        return "周一"
    elif(update.find("周二")!=-1):
        return "周二"
    elif(update.find("周三")!=-1):
        return "周三"
    elif(update.find("周四")!=-1):
        return "周四"
    elif(update.find("周五")!=-1):
        return "周五"
    elif(update.find("周六")!=-1):
        return "周六"
    elif(update.find("周日")!=-1):
        return "周日"
    else:
        return "已完结"
def getde(media_id):
    global id
    url="https://www.bilibili.com/bangumi/media/md{}/".format(media_id)

    de = requests.get(url, headers)
    htmlde=de.text

    soup = BeautifulSoup(htmlde, 'html.parser')
    src = soup.select('script')[5].string


    src_element = js2xml.parse(src, encoding='utf-8', debug=False)
    try:
        actors=src_element.xpath('//property[@name="actors"]/string')[0].text
    except:
        actors="无"
    try:
        staff = src_element.xpath('//property[@name="staff"]/string')[0].text

    except:
        staff="无"
    try:
        introduction = src_element.xpath('//property[@name="evaluate"]/string')[0].text

    except:
        staff="无"
    try:
        start_date = src_element.xpath('//property[@name="pub_date"]/string')[0].text
    except:
        start_date="1970-1-1"
    try:
        up_date = src_element.xpath('//property[@name="time_length_show"]/string')[0].text

    except:
        up_date="无"




    up_date=zhou(up_date)
    sql="update animate set actors=%s,staff=%s,introduction=%s,start_date=%s,up_date=%s where animate_id=%s"
    args=(actors,staff,introduction,start_date,up_date,id)
    db.ping(reconnect=True)
    cursor.execute(sql,args)
    db.commit()
    try:
        tags=src_element.xpath('//property[@name="styles"]//string')
        for tag in tags:
            sql="insert into tags(tag,animate_id) value (%s,%s)"
            args=(tag.text,id)
            db.ping(reconnect=True)
            cursor.execute(sql,args)
            db.commit()
    except:
        pass


def video(season_id):
    global id
    global videoid
    url="https://api.bilibili.com/pgc/web/season/section?season_id={}".format(season_id)
    videolie = requests.get(url,headers)
    jiema=videolie.json()
    jsvideo=json.dumps(jiema,ensure_ascii=False)
    pyvideo=json.loads(jsvideo)
    try:
        videolist=pyvideo["result"]["main_section"]["episodes"]
        for onevideo in videolist:
            name=onevideo["long_title"]
            no=onevideo["title"]
            cover=onevideo["cover"]
            views=0
            sql="insert into video(video_id,animate_id,no,name,views,cover) value (%s,%s,%s,%s,%s,%s)"
            args=(videoid,id,no,name,views,cover)
            db.ping(reconnect=True)
            cursor.execute(sql,args)
            db.commit()
            videoid=videoid+1
    except:
        pass



def wrilie():
    global id
    for i in range(126):
        j=i+1
        lie=getlie(j)
        liejs=lie.json()
        a=json.dumps(liejs,ensure_ascii=False)
        b=json.loads(a)
        c=b["result"]["data"]
        d=len(c)
        for n in range(d):
            try:
                index_show = str(c[n]["index_show"])
            except:
                continue
            if(index_show=="即将开播"):
                continue
            animate_id=id
            name=str(c[n]["title"])
            views=0
            likes=0
            area="日本"
            season_id=str(c[n]["season_id"])
            try:

                cover=str(c[n]["cover"])
            except:
                cover="无"
            is_finish=str(c[n]["is_finish"])
            media_id=str(c[n]["media_id"])
            try:

                index_show=str(c[n]["index_show"])
            except:
                index_show="无"
            try:

                score=str(c[n]["order"]["score"]).replace("分","")
            except:
                score=0
            sql1="insert into animate(animate_id,name,views,likes,area,cover,score,is_finish,index_show) values (%s,%s,%s,%s,%s,%s,%s,%s,%s)"
            args=(animate_id,name,views,likes,area,cover,score,is_finish,index_show)
            db.ping(reconnect=True)
            cursor.execute(sql1,args)
            db.commit()
            getde(media_id)
            video(season_id)
            print("已插入{}相关信息".format(name))
            id+=1


wrilie()
print("已完成所有番剧的添加！！总共{}部！！".format(id-100000))
db.close()