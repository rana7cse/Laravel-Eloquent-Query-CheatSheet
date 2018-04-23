
# Laravel Eloquent Query CheatSheet

#### `SELECT` your table columns in different way
You can use any type of method to *select table columns* for your expected result.
```
$user = User::query();
$user->select('`name` as another_name','age','onanno');
$user->select(['name','age','onanno',DB::raw('count(*) as user_count')]);
$user->selectRaw("`age` * ?",[2]);
$user->addSelect('column1','column2');
```

### Writing *`where` clause* 
Boost up your query writing skill with eloquent to know different type of use of `where` clause
```
$model = Model::where('age',20); // where age = 20
$model->where(age,'<',20); // where age < 20
$model->where([
    ['status' ,'=','active'],
    ['age' ,'<',20],
]);
$model->where(function($query){
    $query->where('a','=','n');
    $query->orWhere('b','=','x');
});

$model->orWhere('gender','!=','...');
$model->orWhere(function($query){
    $query->where('a','=','n');
    $query->orWhere('b','=','x');
});

$model->whereStatus('active'); // where `status` = 'active'
$model->whereColumn('updated_at','>','created_at');

$model->whereRaw("`col1` * `col2` > ?",[100]);
$model->whereRaw(DB::raw("`COL` IN (SELECT `Y1` FROM `Y` GROUP BY `Y`)"));

$model->whereExists(function($query){
    $query->select(DB::raw(1))->from('something')
    ->whereRaw('something.user_id = another.id');
});
$model->whereNotExists(function($query){
    $query->select(DB::raw(1))->from('something')
    ->whereRaw('something.user_id = another.id');
});

$model->whereBetween('age',[18,30]);
$model->whereNotBetween('age',[18,30]);

$model->whereIn('id',[1,2,3]);
$model->whereNotIn('id',[1,2,3]);

$model->whereNull('mula');
$model->whereNotNull('mula');

$model->whereIsNull('status'); // where status is null
$model->whereIsNotNull('status'); // where status is null

$model->whereDate('date_time','YYYY-MM-DD');
$model->whereYear('date_time','2018');
$model->whereMonth('date_time','12');
$model->whereDay('date_time','1');
$model->whereTime('date_time','1:00');
// Another whereHas for relational model
$model->whereHas('phone',function($q){
    $q->whereActive(1);
});
$model->whereDoesntHave('phone',function($q){
    $q->whereActive(0);
});
```
