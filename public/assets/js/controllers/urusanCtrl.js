'use strict';

app.controller('UrusanCtrl', ['$scope', 'urusan', '$http', '$timeout', function ($scope, urusan) {
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
        window.open ('../api/v1/cetak-urusan','_blank');
    };
    //Init dataAkun
    $scope.dataUrusan = '';
console.log('sdsdsdsd')
    // init get data
    urusan.get($scope.main.page, $scope.main.term)
        .success(function (data) {

            //Change Loading status
            $scope.setLoader(false);

            // result data
            $scope.dataUrusan = data.data;
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

        urusan.get($scope.main.page, $scope.main.term)
            .success(function (data) {

                //Stop loading
                $scope.setLoader(false);

                // result data
                $scope.dataUrusan = data.data;

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

//hapus lewat tampilan
    $scope.hapus = function (id) {
        var confirm = $mdDialog.confirm()
            .title('Konfirmasi')
            .content('Apakah Anda yakin ingin menghapus data?')
            .ok('Hapus')
            .cancel('Batal')
            .targetEvent(id);
        //
        $mdDialog.show(confirm).then(function () {
            urusan.destroy(id)
                .success(function (data) {
                    if (data.success == true) {
                        $scope.showToast('green', 'Data Berhasil Dihapus');
                    } else {
                        $scope.showToast('red', data.result.message);
                    }
                    $scope.getData();
                })

        }, function () {

        });
    };
    $scope.kunci = function (id) {
        var confirm = $mdDialog.confirm()
            .title('Konfirmasi')
            .content('Apakah Anda yakin ingin Kunci data?')
            .ok('Kunci')
            .cancel('Batal')
            .targetEvent(id);
        //
        $mdDialog.show(confirm).then(function () {
            urusan.kunci(id)
                .success(function (data) {
                    if (data.success == true) {
                        $scope.showToast('green', 'Data Berhasil Dikunci');
                    } else {
                        $scope.showToast('red', 'Data Gagal Dikunci ');
                    }
                    $scope.getData();
                })

        }, function () {

        });
    };
    $scope.buka = function (id) {
        var confirm = $mdDialog.confirm()
            .title('Konfirmasi')
            .content('Apakah Anda yakin ingin buka Kunci ?')
            .ok('buka')
            .cancel('Batal')
            .targetEvent(id);
        //
        $mdDialog.show(confirm).then(function () {
            urusan.kunci(id)
                .success(function (data) {
                    if (data.success == true) {
                        $scope.showToast('green', 'Data Berhasil Dibuka');
                    } else {
                        $scope.showToast('red', 'Data Gagal Dibuka');
                    }
                    $scope.getData();
                })

        }, function () {

        });
    };
    $scope.detailurusan = function (id) {
        $mdDialog.show({
            controller: 'DeModalCtrl1',
            templateUrl: '../angular/src/urusan/urusan/detailurusan.dialog.html',
            targetEvent: id,
            locals: {
                id: id
            }
        })
            .then(function (answer) {
                $scope.alert = 'You said the information was "' + answer + '".';
            }, function () {
                $scope.alert = 'You cancelled the dialog.';
            });
    };

    //Alert
    $scope.showToast = function (warna, msg) {
        $mdToast.show({
            //controller: 'AkunToastCtrl',
            template: "<md-toast class='" + warna + "-500'><span flex> " + msg + "</span></md-toast> ",
            //templateUrl: 'views/ui/material/toast.tmpl.html',
            hideDelay: 3000,
            parent: '#toast',
            position: 'top right'
        });
    };


}]);

app.controller('DeModalCtrl1', ['$state', '$scope', 'urusan', '$mdDialog', '$mdToast', 'id', function ($state, $scope, urusan, $mdDialog, $mdToast, id) {
    //console.log(dataAkun);

    //Init input form variable
    $scope.id = id;
    $scope.input = {};

    //Set process status to false
    $scope.process = false;

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

    $scope.setLoader(false);

    //Init Alert status
    $scope.alertset = {
        show: 'hide',
        class: 'green',
        msg: ''
    };
    urusan.show($scope.id)
        .success(function (data) {
            $scope.input = data;
            $scope.setLoader(false);
        });
    //Close Dialog
    $scope.cancel = function () {
        $mdDialog.cancel();
    }
}]);
