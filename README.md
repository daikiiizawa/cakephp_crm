# CRM(顧客管理システム)

## システム要件
* 使用言語: PHP5.6
* 使用環境: CakePHP2.8系
* ライブラリやプラグイン: 自由に使用できる 
* デザイン: BootStrap3を使用すること(カスタマイズ可能、BootStrapベース テーマ 利用不可) 
* レイアウト: BootStrap グリッドデザインをベースとし、PCとスマートフォンで閲覧可能とする

## データベース構成
* データベース名
	* cakephp_crm
* テーブル
	* customers
	* companies
	* users
	* posts
	* comments

## ビュー
* Users
	* ログイン画面</dd>
	* ユーザー新規登録画面
	* ユーザー編集画面
	* パスワードリマインダー画面  </dd>
  
* Customers
	* 顧客情報一覧画面
	* 顧客新規登録画面
	* 顧客詳細画面
	* 顧客情報編集画面

## コントローラー内アクション
* Users
	* login
	* signup
	* useredit
	* remind

*	Customers
	* index
	* add
	* view
	* edit
