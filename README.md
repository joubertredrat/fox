## Fox

Fox is a micro framework MVC in PHP for simple and fast build small applications. It emerged from a dark time, when I needed to do a small test and my internet wasn't working, away from the contemporary world with a modern composer and very nice libraries... but, solved problem :)

#### Install

* `git clone https://github.com/joubertredrat/fox.git`
* Point your apache to a `public` folder and done, is working.

On future I will provide this as `composer create-project`

#### Features
* Extreme very slim, `fox` folder have only 124Kb.
* Don't have external libraries, all was written in pure PHP.
* Dynamic router to controller, see [How to work?](#how-to-work).
* Composer compatible, you can add your library without problems.
* Controller and Model is OOP (maybe in future View can be too).

#### How to work?

Fox have Dynamic router based on uri request on public index, as as shown below:
```
/users/list-admin/br = request
                                ____________________________
                               | users == Controller\Users  |
request => index.php => router | list-admin == listAdmin()  | => Controller\Users->listAdmin(arg) => View
                               | br == arg <= br            |
                               |____________________________|
```

#### Todo 
* [ ] Provide this into `composer create-project`.
* [ ] Configure router to work without rewrite option, for use with nginx or php webserver as example.
