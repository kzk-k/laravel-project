# プロジェクト作成（make project）後にやること

-   `config/app.php`の `TelescopeServiceProvider` の設定をコメントアウト
-   `app/Providers/AppServiceProvider.php`の編集
-   `composer.json` の編集
-   `app/Console/Kernel.php`の編集
-   `.vscode`ディレクトリを移す
-   `.env`, `.env.example` の編集

## その他

-   devcontainer は MySQL のみインストールした設定
    -   プロジェクトによって`customizations`のところだけ移す
-   clone してディレクトリ名を変える場合は rebuild が必要っぽい
    -   rebuild に時間がかかるから必要なものだけ抜き出す方が早いっぽい
-   unable to prepare context clone のエラーが出たら
    -   `https://laravel.com/docs/10.x/sail#installing-composer-dependencies-for-existing-projects`

## devcontainer の説明

-   ファイルを開いたときにエディタ内に「フォルダーに開発コンテナーの構成ファイルが含まれています。 コンテナーで開発するフォルダーをもう一度開きます」の表示が出ない場合は、devcontainer インストール  
    https://marketplace.visualstudio.com/items?itemName=ms-vscode-remote.remote-containers

-   `cmd + shift + p`でコマンドパレットを開いたら reopen を入力  
    「コンテナーで再度開く」を選択
-   コンテナ作成後
    `make init`
-   localhost にアクセス

#### 終了

エディタ左下の開発コンテナーをクリック → リモート接続を終了
（他の方法あるかも）

#### 2 回目以降

-   コンテナで開く
-   `npm run dev`
