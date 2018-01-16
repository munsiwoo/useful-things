# web-storage-NAS-
web storage made in php

default password : abcde

~~~
# example
server : lighttpd/1.4.32 + php5.5.15
url : http://seevar.iptime.org:8000
~~~
~~~
lighttpd 1.4.40 이하는 용량이 큰 파일은 업로드, 다운로드 지원을 안하므로 X-Sendfile 을 사용해야 한다.
link : https://redmine.lighttpd.net/projects/1/wiki/X-LIGHTTPD-send-file

# 리스팅 한글 깨짐 설정
lighttpd.conf 에서
dir-listing.encoding = "utf-8"
이렇게 설정해야 리스팅했을 때 한글이 나온다.
~~~
