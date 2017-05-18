app.controller('FormulirsCreateCtrl', ['$state', '$scope', 'formulirs', '$timeout', 'SweetAlert', 'toaster', '$stateParams', '$http', function ($state, $scope, formulirs, $timeout, SweetAlert, toaster, $stateParams) {
    //Init input addForm variable
    //create formulirs
    $scope.id = $scope.$stateParams.id;
    $scope.process = false;
    $scope.myModel = {}
    formulirs.cekinputformulir($scope.id)
        .success(function (data) {
            $scope.batasinput = data;
            if ($scope.batasinput == 1) {
                window.location = "/pendaftaran#/app/formulirs/" + $scope.id;       
            }

        })
    var handleFileSelect1 = function (evt) {
        var file = evt.currentTarget.files[0];
        var reader = new FileReader();
        reader.onload = function (evt) {
            $scope.$apply(function ($scope) {
                $scope.images1 = evt.target.result;
            });
        };
        reader.readAsDataURL(file);

    };
    angular.element(document.querySelector('#fileInput1')).on('change', handleFileSelect1);

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


    // $scope.cekgetlist()
    $scope.closeAlert = function (index) {
        $scope.alerts.splice(index, 1);
    };
    $scope.clearInput = function () {
        $scope.myModel.asal_sekolah = null;
        $scope.myModel.n_bi = null;
        $scope.myModel.n_mtk = null;
        $scope.myModel.n_ipa = null;
        $scope.myModel.n_ing = null;
        $scope.myModel.biodata_id = null;
    };

    $scope.submitData = function (isBack) {
        $scope.alerts = [];
        //Set process status
        $scope.process = true;
        //Close Alert

        //Check validation status
        if ($scope.Form.$valid) {
            //run Ajax
            $scope.myModel.biodatas_id = $scope.id
            // $scope.myModel.foto_ijazah= $scope.myImage

            var file1 = $scope.image1;
            //console.log(file)
            $scope.myModel.foto_ijazah = file1.name;

            formulirs.uploadFile1(file1)
                .success(function (data) {
                    formulirs.store($scope.myModel)
                    if (data.created == true) {
                        //If back to list after submitting
                        if (isBack == true) {
                            formulirs.cekidformulir()
                                .success(function (data1) {
                                    window.location = "/pendaftaran#/app/pendaftarans-create/" + data1;

                                })
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