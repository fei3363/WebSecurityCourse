# 部屬 SQL injection LAB

## 安裝 docker 
- 可以參考 https://docs.docker.com/engine/install/ubuntu/#install-using-the-repository

- use root
```
apt-get update
apt-get install ca-certificates curl gnupg lsb-release
curl -fsSL https://download.docker.com/linux/ubuntu/gpg | gpg --dearmor -o /usr/share/keyrings/docker-archive-keyring.gpg
echo \
  "deb [arch=$(dpkg --print-architecture) signed-by=/usr/share/keyrings/docker-archive-keyring.gpg] https://download.docker.com/linux/ubuntu \
  $(lsb_release -cs) stable" | tee /etc/apt/sources.list.d/docker.list > /dev/null
apt-get update
apt-get install docker-ce docker-ce-cli containerd.io
docker run hello-world
```
- use sudo
```
sudo apt-get update
sudo apt-get install \
    ca-certificates \
    curl \
    gnupg \
    lsb-release
curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo gpg --dearmor -o /usr/share/keyrings/docker-archive-keyring.gpg
echo \
  "deb [arch=$(dpkg --print-architecture) signed-by=/usr/share/keyrings/docker-archive-keyring.gpg] https://download.docker.com/linux/ubuntu \
  $(lsb_release -cs) stable" | sudo tee /etc/apt/sources.list.d/docker.list > /dev/null
sudo apt-get update
sudo apt-get install docker-ce docker-ce-cli containerd.io
sudo docker run hello-world
```

## 安裝 docker-compose
```
curl -L "https://github.com/docker/compose/releases/download/1.29.2/docker-compose-$(uname -s)-$(uname -m)" -o /usr/local/bin/docker-compose
chmod +x /usr/local/bin/docker-compose
docker-compose --version
```

## 建立網站資料夾
- 如專案資料夾內的檔案
```
.
├── db
│   └── db.sql
├── docker-compose.yml
├── web-image
│   └── Dockerfile
└── www
    ├── config.php
    ├── index.php
    ├── login.php
    └── robots.txt
```

## 執行 docker-compose
- 確認資料夾有 docker-compose.yml 
```
$ ls
db docker-compose.yml web-image www
```
- 利用 docker-compose 執行 
  - `up` 執行
  - `-d` 在背景執行
  - `--build` 進行編譯 
```
$ docker-compose up -d --build
```


## 外網掛域名的步驟

### 編輯 nginx 
```
apt install nginx -y
vim /etc/nginx/sites-enabled/website
vim docker-compose.yml
add hostname: test.fei.works
service nginx restart
```

### 設定 domain
- A 紀錄 IP

### 安裝 cret
- https://certbot.eff.org/
- https://certbot.eff.org/instructions?ws=nginx&os=ubuntufocal

```
snap install core;snap refresh core
snap install --classic certbot
ln -s /snap/bin/certbot /usr/bin/certbot
certbot --nginx
```
