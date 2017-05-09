app.controller('BiodatasCreateCtrl', ['$state', '$scope', 'biodatas', '$timeout', 'SweetAlert', 'toaster', '$http', function ($state, $scope, biodatas, $timeout, SweetAlert, toaster) {
    //Init input addForm variable
    //create biodatas

    $scope.myModel = {};
    $scope.process = false;
    biodatas.getbatasinput()
        .success(function (data) {
            $scope.batasinput = data;
            if ($scope.batasinput == 1 && dataUser.level != 1) {

            }
        })
    $scope.myModel = {};
    $scope.process = false;
    biodatas.getbatasinput()
        .success(function (data) {
            $scope.batasinput = data;
            if ($scope.batasinput == 1) {

                $state.go("app.biodatas")
            }
        })

    $scope.master = $scope.myModel;
    $scope.form = {

        submit: function (form) {
            var firstError = null;
            if (form.$invalid) {

                var field = null, firstError = null;
                for (field in form) {
                    if (field[0] != '$') {
                        if (firstError === null && !form[field].$valid) {
                            firstError = form[field].$name;
                        }

                        if (form[field].$pristine) {
                            form[field].$dirty = true;
                        }
                    }
                }
                angular.element('.ng-invalid[name=' + firstError + ']').focus();
                SweetAlert.swal("The form cannot be submitted because it contains validation errors!", "Errors are marked with a red, dashed border!", "error");
                return;

            } else {
                SweetAlert.swal("Good job!", "Your form is ready to be submitted!", "success");
                //your code for submit
            }

        },
        reset: function (form) {

            $scope.myModel = angular.copy($scope.master);
            form.$setPristine(true);
        }

    };
    $scope.closeAlert = function (index) {
        $scope.alerts.splice(index, 1);
    };


    $scope.objjurusan = []
    biodatas.getListjurusan()
        .success(function (data_akun) {
            if (data_akun.success == false) {
                $scope.toaster = {
                    type: 'warning',
                    title: 'Warning',
                    text: 'Data Belum Tersedia!'
                };
                toaster.pop($scope.toaster.type, $scope.toaster.title, $scope.toaster.text);

            } else {
                data_akun.unshift({id: 0, nama: 'Silahkan Pilih Jurusan'});
                $scope.objjurusan = data_akun;
                $scope.myModel.jurusans = $scope.objjurusan[0];
            }
        })

    $scope.objjurusan2 = []
    biodatas.getListjurusan()
        .success(function (data_akun) {
            if (data_akun.success == false) {
                $scope.toaster = {
                    type: 'warning',
                    title: 'Warning',
                    text: 'Data Belum Tersedia!'
                };
                toaster.pop($scope.toaster.type, $scope.toaster.title, $scope.toaster.text);

            } else {
                data_akun.unshift({id: 0, nama: 'Silahkan Pilih Jurusan'});
                $scope.objjurusan2 = data_akun;
                $scope.myModel.jurusans_2 = $scope.objjurusan2[0];
            }
        })

    $scope.clearInput = function () {
        $scope.myModel.nama_lengkap = null;
        $scope.myModel.email = null;
        $scope.myModel.jk = null;
        $scope.myModel.agama = null;
        $scope.myModel.tempat_lahir = null;
        $scope.myModel.tanggal_lahir = null;
        $scope.myModel.alamat = null;
        $scope.myModel.desa = null;
        $scope.myModel.kecamatan = null;
        $scope.myModel.kabupaten = null;
        $scope.myModel.provinsi = null;
        $scope.myModel.jurusan = null;
        $scope.myModel.jurusans_2 = null;
        $scope.myModel.users_id = null;
    };


    $scope.today = function () {
        $scope.dt = new Date();
    };
    $scope.today();

    $scope.clear = function () {
        $scope.dt = null;
    };

    // Disable weekend selection
    $scope.disabled = function (date, mode) {
        return ( mode === 'day' && ( date.getDay() === 0 || date.getDay() === 6 ) );
    };

    $scope.toggleMin = function () {
        $scope.minDate = $scope.minDate ? null : new Date();
    };
    $scope.toggleMin();

    $scope.open = function ($event) {
        $event.preventDefault();
        $event.stopPropagation();

        $scope.opened = true;
    };
    $scope.dateOptions = {
        formatYear: 'yy',
        startingDay: 1,
        class: 'datepicker'
    };

    $scope.initDate = new Date('2016-15-20');
    $scope.formats = ['dd-MMMM-yyyy', 'yyyy/MM/dd', 'dd.MM.yyyy', 'shortDate'];
    $scope.format = $scope.formats[0];


    $scope.submitData = function (isBack) {
        $scope.alerts = [];
        //Set process status
        $scope.process = true;
        //Close Alert

        //Check validation status
        if ($scope.Form.$valid) {
            //run Ajax


            if ($scope.myModel.tanggal_lahir instanceof Date) {
                //$scope.d = new Date();
                $scope.year = $scope.myModel.tanggal_lahir.getFullYear();
                $scope.month = $scope.myModel.tanggal_lahir.getMonth() + 1;
                $scope.day = $scope.myModel.tanggal_lahir.getDate();
                if ($scope.month < 10) {
                    $scope.month = "0" + $scope.month;
                }
                if ($scope.day < 10) {
                    $scope.day = "0" + $scope.day;
                }
                $scope.myModel.tanggal_lahir = $scope.day + "/" + $scope.month + "/" + $scope.year;
            }

            $scope.myModel.jurusan = $scope.myModel.jurusans.id
            $scope.myModel.jurusans_2 = $scope.myModel.jurusans_2.id

            biodatas.store($scope.myModel)
                .success(function (data) {
                    if (data.created == true) {
                        //If back to list after submitting
                        if (isBack == true) {

                            biodatas.getidbiodatas()
                                .success(function (data1) {
                                    window.location = "/pendaftaran#/app/formulirs-create/" + data1;

                                })
                            // $state.go('app.formulirs-create');
                            $scope.toaster = {
                                type: 'success',
                                title: 'Sukses',
                                text: 'Simpan Data Berhasil!'
                            };
                            toaster.pop($scope.toaster.type, $scope.toaster.title, $scope.toaster.text);
                        } else {
                            $scope.clearInput();
                            $scope.sup();
                            $scope.alerts.push({

                                type: 'success',
                                type: 'success',
                                msg: 'Simpan Data Berhasil!'
                            });
                            $scope.process = false;
                            $scope.toaster = {
                                type: 'success',
                                title: 'Sukses',
                                text: 'Simpan Data Berhasil!'
                            };
                            toaster.pop($scope.toaster.type, $scope.toaster.title, $scope.toaster.text);
                        }
                    }
                })

                .error(function (data, status) {
                    // unauthorized
                    if (status === 401) {
                        //redirect to login
                        $scope.redirect();
                    }
                    $scope.sup();
                    // Stop Loading
                    $scope.process = false;
                    $scope.alerts.push({
                        type: 'danger',
                        msg: data.validation
                    });
                    $scope.toaster = {
                        type: 'error',
                        title: 'Gagal',
                        text: 'Simpan Data Gagal!'
                    };
                    toaster.pop($scope.toaster.type, $scope.toaster.title, $scope.toaster.text);
                });

        }
    }
    //Clear Input
}])