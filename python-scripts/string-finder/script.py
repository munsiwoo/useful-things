#-*-coding utf-8-*-
import os, codecs

# made by munsiwoo
pwd = input("pwd : ")
keyword = input("keyword : ")
func = keyword.split(",")

for path, dirs, files in os.walk(pwd) :
	for file in files :
		if(os.path.splitext(file)[1].lower() == ".php") :
			try :
				php = codecs.open(os.path.join(path, file), "r", "utf-8")
				data = php.read()
				for x in func :
					if(data.find(x) != -1) :
						print(os.path.join(path, file))
			except(UnicodeDecodeError) :
				continue

print("end")