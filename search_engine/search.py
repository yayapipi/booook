activate_this = "/home/yayapipi/project/bin/activate_this.py"
execfile(activate_this, dict(__file__=activate_this))

import requests
import sys 
import codecs
from bs4 import BeautifulSoup

r = requests.get('https://search.books.com.tw/search/query/key/'+sys.argv[1])
f = codecs.open('search-result.txt','w+',"utf-8")
if r.status_code == requests.codes.ok:

  soup = BeautifulSoup(r.text, 'html.parser')

  stories = soup.find_all('a',rel='mid_image')
  for s in stories:
    f.write("#Title:" + s.get('title')+"#End")
    href_cut_start = 'item/'
    href_cut_end = '/page/'
    href = s.get('href')
    href = href[href.index(href_cut_start)+len(href_cut_start):href.index(href_cut_end)]
    f.write("#Url:" + href+"#End")


  image = soup.find_all('img',class_='itemcov')
  for i in image:
    image_cut_start = 'getImage?i='
    image_cut_end = '&'
    image_start_pos = i.get('data-original').index(image_cut_start)
    image_end_pos = i.get('data-original').index(image_cut_end)
    image = i.get('data-original')[image_start_pos+len(image_cut_start):image_end_pos]
    f.write("#Image:" + image+"#End")

f.close()

    
