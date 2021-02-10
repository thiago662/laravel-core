# Estudo do Laravel

## Criação de projetos

1. composer create-project --prefer-dist laravel/laravel name-project

2. criação dos hosts em:

    /private/etc/hosts (hosts do mac)

    sudo nano /private/etc/hosts

    Applications/MAMP/conf/apache/extra/httpd-vhosts.conf (hosts do MAMP)

## Clonar do git

1. composer install

2. clonar o .env

    copy .env.example .env (windows)


    mac: cp .env.example .env (mac)

3. Editar arquivo .env

    DB_CONNECTION=psql

    DB_HOST=127.0.0.1

    DB_PORT=5432

    DB_DATABASE=curso

    DB_USERNAME=postgres

    DB_PASSWORD=123456

4. php artisan key:generate

5. php artisan serve

## Comandos do laravel

### Migrate

1. criar:

    php artisan make:migration create_products --create=products

2. roda as migration:

    php artisan migrate

3. volta a migration:

    php artisan migrate:rollback

4. migrations existentes e que já foram rodadas:

    php artisan migrate:status

5. dá rollback em todos:

    php artisan migrate:reset

6. executa o down de todos e depois o up de todos:

    php artisan migrate:refresh

7. ele executa o comando drop no banco e depois cria as migrations novamente:

    php artisan migrate:fresh

### Model

1. Criar model de preferencia com letra maiuscula (cria migration junto):

    php artisan make:model Product -m

    php artisan make:model Product --migration

2. Criar registro utilizando o tinker (todos os comandos utilizados no tinker pode ser colocados no codigo):

    php artisan tinker

    use \App\Brand;

    Brand::all()

    $brand = new Brand;

    $brand->name = "Samsung";

    $brand->save()

    Brand::create(["name"=>"Samsung"]);

### Controller

1. Criar controller:

    php artisan make:controller ProductController

    php artisan make:controller ProductController --resource

    php artisan make:controller ProductController --api

### Eloquent

1. Pegar todos:

    Brand::all();

2. Criar novo registro:

    $brand->name = "Samsung";

    $brand->save();

    Brand::create(["name"=>"Samsung"]);

3. Retorn de id especifico:

    Brand::find(1);

    Brand::find([1,2]);

4. Comando where para pesquisa com condições:

    Brand::where('id',1);

    Brand::where('id',1)->get();

    Brand::where('id','>',1)->get();

    Brand::where('name',"Samsung")->get();

5. Dentro de um intervalo:

    Brand::whereBetween('id',[1,3])->get();

6. Não esta dentro do intervalo:

    Brand::whereNotBetween('id',[0,1])->get();

7. Não esta dentro do array:

    Brand::whereNotIn('id',[0,1])->get();

8. Esta dentro do array:

    Brand::whereIn('id',[0,1])->get();

9. Utilizando like:

    Brand::where('name','like','%e%')->get();

    Brand::where('name','like','%e')->get();

    Brand::where('name','like',"%$name%")->get();

10. Consultar mais de um campo (Returnam um Builser que pode ser utilizado de formas diferentes, podendo encadear):

    Brand::where('id','>','1')->where('name',"LG")->get();

    Brand::where('id','>=','3')->orWhere('name',"Samsung")->get();

11. Encadeamento complexo:

    Brand::where( function($query){ $query->where('id','>',1)->where('id','<',4);})->get();

    Brand::where( function($query){ $query->where('id','>',1)->where('id','<',4);})->where( function($query){ $query->where('name','LG')->orWhere('name','Apple');})->get();

12. Odernar:

    Brand::orderBy('name')->get();

    Brand::orderBy('name','desc')->get();

    Brand::where('id','>',1)->orderBy('name','desc')->get();

13. All() returna uma collections:

    Brand::all();

14. Primeiro elemento:

    Brand::all()->first();

15. Ultimo elemento:

    Brand::all()->last();

16. Inverte a busca:

    Brand::all()->reverse();

17. Inverte a busca:

    Brand::all()->pluck('name');

18. Ele retorna uma collection tambem, podendo ser manipulado:

    Brand::all()->pluck('name')->first();

19. Transforma em array:

    Brand::all()->pluck('name')->toArray();

20. Transforma em json:

    Brand::all()->pluck('name')->toJson();

    Brand::all()->toJson();

21. Retorna um aleatorio (Não retorna uma collection):

    Brand::all()->random();

22. Media (Não retorna uma collection):

    Brand::all()->avg('id');

23. Maior:

    Brand::all()->max('id');

24. Menor:

    Brand::all()->min('id');

25. Soma:

    Brand::all()->sum('id');

26. Agrupa collections:

    Brand::all()->chunk(2);

27. Alterar registro:

    $brand = Brand::find(2);

    $brand->name = "Lenovo";

    $brand->save();

28. Pode mudar diversos atributos:

    $brand->fill(['name'=>'LG']);

29. Utilizado where:

    Brand::where('id','>',3)->update(['name'=>'LG']);

    Brand::where('id',4)->update(['name'=>'Lenovo']);

30. Apagar:

    $brand = Brand::find(1);

    $brand->delete();

    Brand::destroy(3);

    Brand::where('id','>',3)->delete();

31. Softdelete deleta e não apaga do banco:

    $brands = Brand::all();

    $brands[0];

    $brands[0]->delete();

32. Retornando todos ate os deletados, retorna um collection:

    Brand::withTrashed();

    Brand::withTrashed()->get();

33. Verificar valor nulo:

    $brands = Brand::withTrashed()->get();

34. Retorna um verdadeiro caso tenha sido apagado:

    $brands[0]->trashed();

35. Retorna todas as deletadas:

    $brands = Brand::onlyTrashed()->get();

36. Restaurar:

    $brands[0]->restore();

37. Apagar na base de dedos:

    $brands[0]->forceDelete();

    Brand::find(3)->forceDelete();

## Comandos do git

1. git init (inicializar repositório)

2. git status (verificar como esta o preparo do seu repositório)

3. git add  -- all (adicionar todos os arquivos para o inicio)

4. git commit -m "`Comentario Do Commit`" (comutar os documentos)

5. git remote add origin `URL DO SEU REPOSITÓRIO` (criar repositório remoto)

6. git remote (verificar repositório remoto)

7. git push -u origin master (enviar os arquivos para o repositório)

8. git clone `URL DO SEU REPOSITÓRIO` `nome-novo`
