<?php


use Phinx\Seed\AbstractSeed;

class GoodsSeeder extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     */
    public function run()
    {
        $sql = 'TRUNCATE goods';
        $this->adapter->query($sql);

        $products = [
            [
                'imgName' => '01.jpg',
                'views' => 0,
                'cost' => 8180000,
                'prodName' => 'BMW 7 series',
                'description' => 'В этой серии некоторые детали ходовой части изготовлены из алюминия, это позволило добиться
         большей точности рулевого управления. В передней части появился новый выступ на капоте, а сзади машины
          установлена новая хромированная планка. По сравнению с более ранними моделями в этой серии также изменились
           передние и задние фары и фартуки.'
            ],
            [
                'imgName' => '02.jpg',
                'views' => 0,
                'cost' => 8670300,
                'prodName' => 'Mercedes-Benz S class',
                'description' => 'Mercedes-Benz S-класс — флагманская серия представительских автомобилей немецкой компании
         Mercedes-Benz, дочернего подразделения концерна Daimler AG. Представляет собой наиболее значимую линейку
          моделей в иерархии классов торговой марки.'
            ],
            [
                'imgName' => '03.jpg',
                'views' => 0,
                'cost' => 8070100,
                'prodName' => 'Audi A8',
                'description' => 'Audi A8 четвертого поколения дебютировал в июле 2017 года, а в феврале 2018-го седан добрался
         до России. Автомобиль построен на новой платформе и получил множество современных опций.'
            ],
            [
                'imgName' => '04.jpg',
                'views' => 0,
                'cost' => 4650800,
                'prodName' => 'Hyundai Genesis G90',
                'description' => 'Автомобиль, пришедший на смену лимузину Hyundai Equus, воплотил в себе дизайнерскую концепцию
         «Athletic Elegance» («Атлетичная элегантность»), «прописал» под своим капотом мощные моторы и получил богатый
          функционал, ничем не уступающий именитым конкурентам.'
            ],
            [
                'imgName' => '05.jpg',
                'views' => 0,
                'cost' => 4200700,
                'prodName' => 'KIA K900',
                'description' => 'Сбалансированный, энергичный, солидный и при этом совсем не скучный. Новый повод для чьей-то
         зависти? Новое представление о роскоши! Впечатляющий дизайн интерьера, скульптурные линии кузова, умные
          технологии и убедительная динамика. KIA K900 — эталон роскошного седана.'
            ],
            [
                'imgName' => 'default.jpg',
                'views' => 0,
                'cost' => 100500,
                'prodName' => 'ВАЗ 2108',
                'description' => 'Отечественное сокровище.',
            ],
            [
                'imgName' => 'default.jpg',
                'views' => 0,
                'cost' => 100500,
                'prodName' => 'ВАЗ 2108',
                'description' => 'Отечественное сокровище.',
            ],
            [
                'imgName' => 'default.jpg',
                'views' => 0,
                'cost' => 125000,
                'prodName' => 'ВАЗ 2110',
                'description' => 'Отечественное сокровище.',
            ],
            [
                'imgName' => 'default.jpg',
                'views' => 0,
                'cost' => 70000,
                'prodName' => 'ВАЗ 21099',
                'description' => 'Отечественное сокровище.',
            ],
            [
                'imgName' => 'default.jpg',
                'views' => 0,
                'cost' => 30000,
                'prodName' => 'ВАЗ 2101',
                'description' => 'Отечественное сокровище.',
            ],
            [
                'imgName' => 'default.jpg',
                'views' => 0,
                'cost' => '99990',
                'prodName' => 'Десятка',
                'description' => 'Отечественное сокровище.',
            ],
            [
                'imgName' => 'default.jpg',
                'views' => 0,
                'cost' => 125000,
                'prodName' => 'ВАЗ 2110',
                'description' => 'Отечественное сокровище.',
            ],
            [
                'imgName' => 'default.jpg',
                'views' => 0,
                'cost' => 50000,
                'prodName' => 'ВАЗ 2105',
                'description' => 'Отечественное сокровище.',
            ],
            [
                'imgName' => 'default.jpg',
                'views' => 0,
                'cost' => 125000,
                'prodName' => 'ВАЗ 2110',
                'description' => 'Отечественное сокровище.',
            ],
        ];
        $this->table('goods')->insert($products)->save();

        $sql = 'TRUNCATE users';
        $this->adapter->query($sql);
        $users = [
            [
                'login' => 'admin',
                'pass' => password_hash('123', PASSWORD_DEFAULT),
                'role' => 1
            ],
            [
                'login' => 'user1',
                'pass' => password_hash('123', PASSWORD_DEFAULT),
                'role' => 0
            ],
            [
                'login' => 'user2',
                'pass' => password_hash('123', PASSWORD_DEFAULT),
                'role' => 0
            ],
            [
                'login' => 'user3',
                'pass' => password_hash('123', PASSWORD_DEFAULT),
                'role' => 0
            ],
        ];

        $this->table('users')->insert($users)->save();

        $sql = 'TRUNCATE feedback';
        $this->adapter->query($sql);
        $feedback = [
            [
                'name' => 'Машка',
                'feedback' => 'Считаю ваш магазин лучшим прелучшим во всем мире :***'
            ],
            [
                'name' => 'Петя',
                'feedback' => 'Широчайший ассортимент автомобилей, все в одном месте, супер!'
            ],
            [
                'name' => 'Иван',
                'feedback' => 'Компетентные менеджеры, сервис - огонь! 5+'
            ],
            [
                'name' => 'Джереми Кларксон',
                'feedback' => 'Oh My God! I never see anything like it! Amazing, best idea!!!'
            ],
            [
                'name' => 'Alex',
                'feedback' => 'my feedback'
            ],
        ];

        $this->table('feedback')->insert($feedback)->save();
    }
}
