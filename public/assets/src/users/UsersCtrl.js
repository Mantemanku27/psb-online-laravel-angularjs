'use strict';

app.controller('UsersCtrl', ['$scope', 'users', 'SweetAlert', '$http','$timeout', function ($scope, users,SweetAlert) {
//urussan tampilan
    $scope.main = {
        page: 1,
        term: ''
    };

    $scope.isLoading = true;
    $scope.isLoaded = false;

    $scope.setLoader = function (status) {
        if (status == true) {
            $scope.isLoading = true;
            $scope.isLoaded = false;
        } else {
            $scope.isLoading = false;
            $scope.isLoaded = true;
        }
    };

    //Init Alert status
    $scope.alertset = {
        show: 'hide',
        class: 'green',
        msg: ''
    };
    //refreshData
    $scope.refreshData = function () {
        $scope.main.page = 1;
        $scope.main.term = '';
        $scope.getData();
    };
    // go to print preview page
    $scope.print = function () {
        window.open ('../api/v1/cetak-users','_blank');
    };
    //Init dataAkun
    $scope.dataUsers = '';
    // init get data
    users.get($scope.main.page, $scope.main.term)
        .success(function (data) {

            //Change Loading status
            $scope.setLoader(false);

            // result data
            $scope.dataUsers = data.data;
            // set the current page
            $scope.current_page = data.current_page;

            // set the last page
            $scope.last_page = data.last_page;

            // set the data from
            $scope.from = data.from;

            // set the data until to
            $scope.to = data.to;

            // set the total result data
            $scope.total = data.total;
        })
        .error(function (data, status) {
            // unauthorized
            if (status === 401) {
                //redirect to login
                $scope.redirect();
            }
            console.log(data);
        });

    // get data
    $scope.getData = function () {

        //Start loading
        $scope.setLoader(true);

        users.get($scope.main.page, $scope.main.term)
            .success(function (data) {

                //Stop loading
                $scope.setLoader(false);

                // result data
                $scope.dataUsers = data.data;

                // set the current page
                $scope.current_page = data.current_page;

                // set the last page
                $scope.last_page = data.last_page;

                // set the data from
                $scope.from = data.from;

                // set the data until to
                $scope.to = data.to;

                // set the total result data
                $scope.total = data.total;
            })
            .error(function (data, status) {
                // unauthorized
                if (status === 401) {
                    //redirect to login
                    $scope.redirect();
                }
                console.log(data);
            });
    };

    // Navigasi halaman terakhir
    $scope.lastPage = function () {
        //Disable All Controller
        $scope.main.page = $scope.last_page;
        $scope.getData();
    };

    // Navigasi halaman selanjutnya
    $scope.nextPage = function () {
        // jika page = 1 < halaman terakhir
        if ($scope.main.page < $scope.last_page) {
            // halaman saat ini ditambah increment++
            $scope.main.page++
        }
        // panggil ajax data
        $scope.getData();
    };

    // Navigasi halaman sebelumnya
    $scope.previousPage = function () {
        //Disable All Controller

        // jika page = 1 > 1
        if ($scope.main.page > 1) {
            // page dikurangi decrement --
            $scope.main.page--
        }
        // panggil ajax data
        $scope.getData();
    };

    // Navigasi halaman pertama
    $scope.firstPage = function () {
        //Disable All Controller

        $scope.main.page = 1;

        $scope.getData()
    };

// //hapus lewat tampilan
//     $scope.hapus = function (id) {
//         var confirm = $mdDialog.confirm()
//             .title('Konfirmasi')
//             .content('Apakah Anda yakin ingin menghapus data?')
//             .ok('Hapus')
//             .cancel('Batal')
//             .targetEvent(id);
//         //
//         $mdDialog.show(confirm).then(function () {
//             users.destroy(id)
//                 .success(function (data) {
//                     if (data.success == true) {
//                         $scope.showToast('green', 'Data Berhasil Dihapus');
//                     } else {
//                         $scope.showToast('red', data.result.message);
//                     }
//                     $scope.getData();
//                 })
//
//         }, function () {
//
//         });
//     };
    $scope.hapus = function (id) {
        SweetAlert.swal({
            title: "Peringatan?",
            text: "Apakah anda yakin ingin hapus",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Delete!",
            cancelButtonText: "Batal!",
            closeOnConfirm: false,
            closeOnCancel: false
        }, function (isConfirm) {
            if (isConfirm) {
                users.destroy(id)
                    .success(function (data) {
                        if (data.deleted == true) {
                            SweetAlert.swal({
                                title: "Berhasil!",
                                text: "Data Berhasil Dihapus.",
                                type: "success",
                                confirmButtonColor: "#007AFF"
                            });

                        } else {
                            SweetAlert.swal({
                                title: "Gagal",
                                text: "Data Gagal Dihapus :)",
                                type: "error",
                                confirmButtonColor: "#007AFF"
                            })

                        }
                        $scope.getData();
                    })


            } else {
                SweetAlert.swal({
                    title: "Cancelled",
                    text: "Your imaginary file is safe :)",
                    type: "error",
                    confirmButtonColor: "#007AFF"
                });
            }
        });
    };


}]);
