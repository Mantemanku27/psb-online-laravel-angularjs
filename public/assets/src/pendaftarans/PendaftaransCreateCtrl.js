app.controller('PendaftaransCreateCtrl', ['$state', '$scope', 'pendaftarans', '$timeout', 'SweetAlert', 'toaster','$stateParams', '$http', function ($state, $scope, pendaftarans, $timeout, SweetAlert, toaster,$stateParams) {
    //Init input addForm variable
    //create pendaftarans
    $scope.myModel ={}
    $scope.id = $scope.$stateParams.id;

    $scope.process = false;
    pendaftarans.cekinputpendaftaran($scope.id)
        .success(function (data) {
            $scope.batasinput = data;
            if ($scope.batasinput == 1) {
                window.location = "/pendaftaran#/app/pendaftarans/" + $scope.id;
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
    $scope.cekgetlist = function () {
        $scope.objjurusan = []
        pendaftarans.getListjurusan($scope.id)
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
}
    $scope.cekgetlist()
    $scope.clearInput = function () {
        $scope.myModel.no_pilihan = null;
        $scope.myModel.status = null;
        $scope.myModel.jurusans_id = null;
        $scope.myModel.formulirs_id = null;
        $scope.cekgetlist()
    };

    $scope.submitData = function (isBack) {
        $scope.alerts = [];
        //Set process status
        $scope.process = true;
        //Close Alert

        //Check validation status
        if ($scope.Form.$valid) {
            //run Ajax
            $scope.myModel.jurusans_id = $scope.myModel.jurusans.id
            $scope.myModel.formulirs_id =$scope.id
            pendaftarans.store($scope.myModel)
                .success(function (data) {
                    if (data.created == true) {
                        //If back to list after submitting
                        if (isBack == true) {
                            window.location = "/pendaftaran#/app/pendaftarans/" + $scope.id;

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
                        //Clear Input
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
    };

}]);