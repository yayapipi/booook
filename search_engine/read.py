activate_this = "/home/yayapipi/project/bin/activate_this.py"
execfile(activate_this, dict(__file__=activate_this))

import requests
import sys 
import codecs
from bs4 import BeautifulSoup

r = requests.get('https://www.books.com.tw/products/'+sys.argv[1])
if r.status_code == requests.codes.ok:
  # 以 BeautifulSoup 解析 HTML 程式碼
  soup = BeautifulSoup(r.text, 'html.parser')

description = soup.find(attrs={"name":"description"})['content']
#print(description)

image = soup.find(attrs={"property":"og:image"})['content']
#print(image)

content = soup.find("div", class_='content')
content = content.text[:100]
content = content.strip();
content = content.split('\n');


#String Process
name_cut_start = '書名：'
name_cut_end = '，'
name_start_pos = description.index(name_cut_start)
name = description[name_start_pos+len(name_cut_start):]
name_end_pos = name.index(name_cut_end)
name = name[:name_end_pos]

isbn_cut_start = 'ISBN：'
isbn_cut_end = '，'
isbn_start_pos = description.index(isbn_cut_start)
isbn = description[isbn_start_pos+len(isbn_cut_start):]
isbn_end_pos = isbn.index(isbn_cut_end)
isbn = isbn[:isbn_end_pos]

page_cut_start = '頁數：'
page_cut_end = '，'
page_start_pos = description.index(page_cut_start)
page = description[page_start_pos+len(page_cut_start):]
page_end_pos = page.index(page_cut_end)
page = page[:page_end_pos]

publisher_cut_start = '出版社：'
publisher_cut_end = '，'
publisher_start_pos = description.index(publisher_cut_start)
publisher = description[publisher_start_pos+len(publisher_cut_start):]
publisher_end_pos = publisher.index(publisher_cut_end)
publisher = publisher[:publisher_end_pos]

author_cut_start = '作者：'
author_cut_end = '，'
author_start_pos = description.index(author_cut_start)
author = description[author_start_pos+len(author_cut_start):]
author_end_pos = author.index(author_cut_end)
author = author[:author_end_pos]

publish_date_cut_start = '出版日期：'
publish_date_cut_end = '，'
publish_date_start_pos = description.index(publish_date_cut_start)
publish_date = description[publish_date_start_pos+len(publish_date_cut_start):]
publish_date_end_pos = publish_date.index(publish_date_cut_end)
publish_date = publish_date[:publish_date_end_pos]

type_cut_start = '類別：'
type_start_pos = description.index(type_cut_start)
types = description[type_start_pos+len(type_cut_start):]

#Get Image URL
image_cut_start = 'getImage?i='
image_cut_end = '&v'
image_start_pos = image.index(image_cut_start)
image_end_pos = image.index(image_cut_end)
image = image[image_start_pos+len(image_cut_start):image_end_pos]

#Display Content
f = codecs.open('read-result.txt','w+',"utf-8")
f.write(name)
f.write("#")
f.write(isbn)
f.write("#")
f.write(page)
f.write("#")
f.write(publisher)
f.write("#")
f.write(author)
f.write("#")
f.write(types)
f.write("#")
f.write(publish_date)
f.write("#")
f.write(image)
f.write("#")
f.write(content[0])
f.write("#")

f.close();

print(name)
print(isbn)
print(page)
print(publisher)
print(author)
print(types)
print(publish_date)
print(image)
print(content[0])
