# 開発環境構築手順
1.project-envディレクトリでdocker立ち上げ  
2.projectディレクトリでcp .env.example .env  
3.phpコンテナに入る 
4.php artisan key:generate
5.composer install  
6.php artisan migrate --seed 
7.npm install  
8.npm run dev

# .envについて
skyway,paypayについては説明書の中に記載したAPIキーを利用してください。

# 注意点
vscodeで開くときはprojectフォルダで開くこと！  
コード整形ツールやlinterが反応しません！  
