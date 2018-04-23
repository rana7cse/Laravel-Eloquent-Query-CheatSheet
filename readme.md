
# Laravel Eloquent Query CheatSheet

#### Column selecting technique `SELECT`
```
$user = User::query();
$user->select('name as another_name','age','onanno');
$user->select(['name','age','onanno',DB::raw('count(*) as user_count')]);
$user->selectRaw("age*?",[2]);
$user->addSelect('column1','column2');
```
You can use any type of method to selecting column to grab result from table.
### Where i'll use `where`? :) Feel free to use `where` any where

```

```
