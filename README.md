## Fox

Fox is a MVC micro-framework written in PHP for building fast, simple and small applications. It emerged from a dark season, when I had issues with my internet connection and needed to do a simple test. Even away from contemporary world, from composer and from modern and cool libraries, I could still solve my problem :)

#### Install

* `git clone https://github.com/joubertredrat/fox.git`
* In your apache installation, set `public` folder as your document root and done, it's working!

In a near future, I will provide `Fox` through `composer create-project`

#### Features
* Extremely slim: `fox` directory's size is only 124 KB.
* Written in pure PHP: you don't need any external library to get it running.
* Dynamic router to controller, (see [How does it work?](#how-does-it-work).
* Composer friendly: you can add any library you want without trouble.
* Object-Oriented Controller and Model (and View, maybe sometime later).

#### How does it work?

Fox has a Dynamic router, based on uri requests into public/index.php, as shown below:
```
/users/list-admin/br = request
                                ____________________________
                               | users == Controller\Users  |
request => index.php => router | list-admin == listAdmin()  | => Controller\Users->listAdmin(arg) => View
                               | br == arg <= br            |
                               |____________________________|
```

#### Todo
* [ ] Provide this through `composer create-project`.
* [ ] Decouple routing from Apache's mod-rewrite, so it could run with Nginx or PHP built-in webserver, for example.
* [ ] Refactor View to OOP aproach.
