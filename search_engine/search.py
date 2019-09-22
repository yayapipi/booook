import requests
import sys 
import codecs
from bs4 import BeautifulSoup

r = requests.get('https://search.books.com.tw/search/query/key/'+sys.argv[1])
f = codecs.open('search-result.txt','w+',"utf-8")
if r.status_code == requests.codes.ok:
  # 以 BeautifulSoup 解析 HTML 程式碼
  soup = BeautifulSoup(r.text, 'html.parser')

  #print(soup.prettify())
  # 以 CSS 的 class 抓出各類頭條新聞
  stories = soup.find_all('a',rel='mid_image')
  for s in stories:
    # 新聞標題
    print("標題：" + s.get('title'))
    f.write("#Title:" + s.get('title')+"#End")
    # 新聞網址
    href_cut_start = 'item/'
    href_cut_end = '/page/'
    href = s.get('href')
    href = href[href.index(href_cut_start)+len(href_cut_start):href.index(href_cut_end)]
    print("網址：" + href)
    f.write("#Url:" + href+"#End")


  image = soup.find_all('img',class_='itemcov')
  for i in image:
    #Get Image URL
    image_cut_start = 'getImage?i='
    image_cut_end = '&'
    image_start_pos = i.get('data-original').index(image_cut_start)
    image_end_pos = i.get('data-original').index(image_cut_end)
    image = i.get('data-original')[image_start_pos+len(image_cut_start):image_end_pos]
    print("圖片：" + image)
    f.write("#Image:" + image+"#End")

f.close()

    
