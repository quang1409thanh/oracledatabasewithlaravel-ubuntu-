# demo oracle laravel

// sau khi cài đặt cấu hình được oracle chạy trong docker trên ubuntu qua bài viết
https://mkc110891.medium.com/oracle-19c-on-ubuntu-18-04-docker-6898cd2916f9
//

1. Đầu tiên chạy docker oracle trên máy và fw đến cổng 1521 để những máy khác có thể dùng.
bằng câu lệnh:
        
    > docker run --name oracle19c --network host -p 1521:1521 -p 5500:5500 -v /u01/oracle:/opt/oracle/oradata oracle/database:19.3.0-ee
2. Sau khi đảm bảo răng máy chủ oracle database đã chạy thành công bằng cách kiểm tra như sau:

     > docker exec -ti oracle19c sqlplus system/oracle@orclpdb1
     
    Nếu thành công sẽ hiện ra SQLPlus... giao diện dòng lệnh để thao tác với oracle database.
3. Cấu hình để có thể kết nối đến oracle database qua bài viết.
https://medium.com/@umaams/setup-oracle-database-in-laravel-72c0d1d1e05

4. Sau khi cài đặt theo bài viết thì ta có thể chạy dự án như sau

    từ repo github. https://github.com/yajra/laravel-oci8
    
    - tạo 1 dự án laravel 
    - sau đó chạy câu lệnh 
            
            composer require yajra/laravel-oci8:^11
    - tiếp theo thêm vào provide của config/app.php

                'providers' => ServiceProvider::defaultProviders()->merge([
                    /*
                    * Package Service Providers...
                    */
                    Yajra\Oci8\Oci8ServiceProvider::class,

                ])->toArray(),

    - tiếp theo chạy câu lệnh

            php artisan vendor:publish --tag=oracle

    - tiếp theo thêm vào provide của config/auth.php

                'providers' => [
                    'users' => [
                        'driver' => 'oracle',
                        'model' => App\User::class,
                    ],
                ],

    - sau đó thêm vào file .env như sau
            
            DB_CONNECTION=oracle
            DB_HOST=192.168.1.18
            DB_PORT=1521
            DB_SERVICE_NAME=ORCLPDB1
            DB_DATABASE=orclpdb1
            DB_USERNAME=system
            DB_PASSWORD=oracle

    (với các thông tin 
            DB_DATABASE=orclpdb1
            DB_USERNAME=system
            DB_PASSWORD=oracle
    được lấy từ bài viết ở phần 1)
    còn với thông tin DB_SERVICE_NAME được lấy như sau
    chạy lệnh bash vào container để xem.

            docker exec -it oracle19c /bin/bash
    truy cập thư mục 

        ORACLE_HOME/network/admin
        thường là: /opt/oracle/product/19c/dbhome_1/network/admin/
    sau đó xem file: ```tnsnames.ora``` và lấy ra thông tin ```DB_SERVICE_NAME```

Như vậy là đã hoàn tất việc kết nối đến oracle database sử dụng laravel

-> sau đây là video demo.
https://youtube.com/live/_wxzPH_v2Qw?feature=share
    
    


    SELECT COLUMN_NAME
    FROM USER_TAB_COLUMNS
    WHERE TABLE_NAME = 'CUSTOMERS';


# oracledatabasewithlaravel-ubuntu-
