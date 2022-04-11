# 開発環境構築手順
1.project-envディレクトリでdocker立ち上げ
2.projectディレクトリでcp .env.example .env
3.phpコンテナに入る
4.composer install
5.php artisan migrate
6.npm install
7.npm run dev

# 注意点
vscodeで開くときはprojectフォルダで開くこと！
コード整形ツールやlinterが反応しません！