app.controller('UserCtrl', ['$scope', 'user', '$mdDialog', '$mdToast', '$http', '$timeout', function ($scope, user, $mdDialog, $mdToast) {
//bidang tampilan
    $scope.main = {
        page: 1,
        term: ''
    };
//loading
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
    $scope.objLvl = [

        {nama: 'Silahkan pilih', id: 0},
        {nama: 'Administrator', id: 100},
        {nama: 'Pimpinan Daerah', id: 101},
        {nama: 'Pimpinan Administrator', id: 102},
        {nama: 'Kontibutor-Perencanaan', id: 103},
        {nama: 'Kontributor-Referensi', id: 104},
        {nama: 'Verifikator-Perencanaan', id: 105},
        {nama: 'Verifikator-LockSystem', id: 106},
    ];

    $scope.getLvl = function (id) {
        for (var i = 0; i < $scope.objLvl.length; i++) {
            if (parseInt($scope.objLvl[i].id) === parseInt(id, 10)) {
                return $scope.objLvl[i];
            }
        }
    };
    $scope.objAct = [

        {aktif: 'Tidak Aktif', id: 0},

        {aktif: 'Aktif', id: 1}

    ];

    $scope.getAct = function (id) {
        for (var i = 0; i < $scope.objAct.length; i++) {
            if (parseInt($scope.objAct[i].id) === parseInt(id, 10)) {
                return $scope.objAct[i];
            }
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
    //Init dataUsers
    $scope.dataUser = '';


    // init get data
    user.get($scope.main.page, $scope.main.term)
        .success(function (data) {

            //Change Loading status
            $scope.setLoader(false);

            // result data
            $scope.dataUser = data.data;
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
        .error(function (data) {
            console.log(data);
        });

    // get data
    $scope.getData = function () {

        //Start loading
        $scope.setLoader(true);

        user.get($scope.main.page, $scope.main.term)
            .success(function (data) {


                //Stop loading
                $scope.setLoader(false);
                $scope.detailbatas = '';
                user.getbatas()
                    .success(function (data) {
                        $scope.detailbatas = data;
                    });

                // result data
                $scope.dataUser = data.data;

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
            .error(function (data) {
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

//hapus urusan lewat tampilan
    $scope.hapus = function (id) {
        var confirm = $mdDialog.confirm()
            .title('Konfirmasi')
            .content('Apakah Anda yakin ingin menghapus data?')
            .ok('Hapus')
            .cancel('Batal')
            .targetEvent(id);
        //
        $mdDialog.show(confirm).then(function () {
            user.destroy(id)
                .success(function (data) {
                    if (data.success == true) {
                        $scope.showToast('green', 'Data Berhasil Dihapus');
                    } else {
                        $scope.showToast('red', 'Data Gagal Dihapus');
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
            user.kunci(id)
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
            user.kunci(id)
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
    $scope.tidakaktif = function (id) {
        var confirm = $mdDialog.confirm()
            .title('Konfirmasi')
            .content('Apakah Anda yakin ingin Tidak Aktifkan Data?')
            .ok('Tidak Aktif')
            .cancel('Batal')
            .targetEvent(id);
        //
        $mdDialog.show(confirm).then(function () {
            user.aktif(id)
                .success(function (data) {
                    if (data.success == true) {
                        $scope.showToast('green', 'Data Berhasil Tidak diaktifkan');

                    } else {
                        $scope.showToast('red', data.result.message);
                    }
                    $scope.getData();
                })

        }, function () {

        });
    };
    $scope.aktif = function (id) {
        var confirm = $mdDialog.confirm()
            .title('Konfirmasi')
            .content('Apakah Anda yakin ingin Aktifkan Data?')
            .ok('Aktif')
            .cancel('Batal')
            .targetEvent(id);
        //
        $mdDialog.show(confirm).then(function () {
            user.aktif(id)
                .success(function (data) {
                    if (data.success == true) {
                        $scope.showToast('green', 'Data Berhasil diaktifkan Data');
                    } else {
                        $scope.showToast('red', data.result.message);
                    }
                    $scope.getData();

                })

        }, function () {

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

    $scope.showdetail = function (id) {
        $mdDialog.show({
            controller: 'UserDetailModalCtrl',
            templateUrl: '../angular/src/master/user/user-detail.dialog.html',
            targetEvent: id,
            locals: {
                user_id: id
            }
        })
            .then(function (answer) {
                $scope.alert = 'You said the information was "' + answer + '".';
            }, function () {
                $scope.alert = 'You cancelled the dialog.';
            });
    };

}]);
app.controller('UserdetailCtrl', ['$state', '$scope', 'user', '$mdDialog', '$mdToast', '$stateParams', function ($state, $scope, user, $mdDialog, $mdToast, $stateParams) {
    // Edit Bidang
    $scope.id = $scope.$stateParams.id;
    //If Id is empty, then redirected
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
$scope.getData = function(){
    user.show($scope.id)

        .success(function (data) {
            $scope.input = data;
            $scope.setLoader(false);
        })
        .error(function (data) {
            // Stop Loading
            console.log(data);

        });
    $scope.dataUser = '';
    user.getlihat()
        .success(function (data) {
            $scope.dataUser = data.result;
        })
        .error(function (data, status) {
            if (status === 401) {
                $scope.redirect();
            }
            console.log(data)
        });

};
    $scope.setLoader(true);
    //Init input form variable
    $scope.input = {};
    $scope.loadKoderekening = true;
    $scope.loadBidang = true;
    $scope.loadUrusan = true;

    $scope.objBidang = [];
    $scope.objUrusan = [];

    //Set process status to false
    $scope.process = false;

    //Init Alert status
    $scope.alertset = {
        show: 'hide',
        class: 'green',

        msg: ''
    };

//fjoepgore
    $scope.setLoader(true);

    //Init input form variable
    $scope.input = {};

    //Init Alert status
    $scope.alertset = {
        show: 'hide',
        class: 'green',
        msg: ''
    };
    $scope.objLvl = [


        {nama: 'Silahkan pilih', id: 0},
        {nama: 'Administrator', id: 100},
        {nama: 'Pimpinan', id: 101},
        {nama: 'Verifikator renstra', id: 102},
        {nama: 'Verifikator Renja', id: 103},
        {nama: 'Pengguna-RPJMD', id: 104},
        {nama: 'Pengguna-KUA', id: 105},
        {nama: 'Pengguna-PPAS', id: 106},
    ];

    $scope.getLvl = function (id) {
        for (var i = 0; i < $scope.objLvl.length; i++) {
            if (parseInt($scope.objLvl[i].id) === parseInt(id, 10)) {
                return $scope.objLvl[i];
            }
        }
    };
    user.detail($scope.id)

        .success(function (data) {
            $scope.input = data;
            $scope.setLoader(false);
        })
        .error(function (data) {
            // Stop Loading
            console.log(data);

        });
    $scope.dataUser = '';
    user.getlihat()
        .success(function (data) {
            $scope.dataUser = data.result;
        })
        .error(function (data, status) {
            if (status === 401) {
                $scope.redirect();
            }
            console.log(data)
        });
    $scope.is_aktif = function () {

        //Set process status
        $scope.process = true;

        //Close Alert
        $scope.alertset.show = 'hide';

        //Check validation status
        if ($scope.editForm.$valid) {


            //run Ajax
            user.updateIsaktif($scope.input.user)
                .success(function (data) {
                    if (data.success == true) {
                        //If back to list after submitting
                        if (isBack = true) {
                            //Redirect to akun
                            $scope.alertset.show = 'hide';
                            $state.go('app.user');
                            $scope.showToast('green', 'Data Aktif Berhasil Di Edit');
                        }
                    } else {
                        $scope.process = false;
                        //$scope.alertset.class = 'orange';
                        $scope.showToast('red', 'Edit Data Gagal !');
                        $scope.alertset.class = 'red';
                    }
                    //Set Alert message
                    $scope.alertset.show = '';
                    $scope.alertset.msg = data.result;

                })
                .error(function (data, status) {
                    switch (status) {
                        case 401 :
                            $scope.redirect();
                            break;
                        case 500 :
                            $scope.sup();
                            $scope.process = false;
                            $scope.alertset.msg = "Internal Server Errors";
                            $scope.alertset.show = 'show';
                            $scope.showToast('red', 'Simpan Data Gagal !');
                            $scope.alertset.class = 'red';
                            break;
                        case 422 :
                            $scope.sup();
                            $scope.process = false;
                            $scope.alertset.msg = data.validation;
                            $scope.alertset.show = 'show';
                            $scope.showToast('red', 'Simpan Data Gagal !');
                            $scope.alertset.class = 'red';
                            break;
                    }
                });
        }
    };
    //Close Dialog

}]);