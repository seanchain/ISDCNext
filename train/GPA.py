import requests
import sys
from bs4 import BeautifulSoup

def getG(x):
    if x>=95:
        return 4
    elif x>=90:
        return 3.8
    elif x>=85:
        return 3.6
    elif x>=80:
        return 3.2
    elif x>=75:
        return 2.7
    elif x>=70:
        return 2.2
    elif x>=65:
        return 1.7
    elif x>=60:
        return 1
    else:
        return 0

def get_content(zjh,mm):
    r=requests.get('http://202.115.47.141/loginAction.do?zjh='+zjh+'&mm='+mm)
    rr=requests.get('http://202.115.47.141/gradeLnAllAction.do?type=ln&oper=fainfo&fajhh=1546',cookies=r.cookies)
    return rr.text

def GPA(zjh,mm):
	soup=BeautifulSoup(get_content(zjh,mm))
	soup=soup.find('table',class_='displayTag',id='user')
	courses=[]
	grade=0
	score=0
	GPA=0
	for tag in soup.find_all('tr'):
		course=[]
		for td in tag.find_all('td'):
			if (td.find('p')):
				course.append(td.find('p').get_text(strip=True))
			else:
				course.append(td.get_text(strip=True))
		courses.append(course)
	for course in courses:
		if len(course)!=0 and course[5]=='必修':
			grade+=int(course[4])
			score+=(float(course[4])*float(course[6]))
			GPA+=getG(float(course[6]))*int(course[4])
	return (GPA/grade,score/grade)

def main(argv):
	zjh=argv[1]
	mm=argv[2]
	print((zjh,mm))
	print(GPA(zjh,mm))

if __name__=='__main__':
	main(sys.argv)
