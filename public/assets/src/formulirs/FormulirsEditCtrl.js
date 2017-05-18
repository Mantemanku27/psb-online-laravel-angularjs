app.controller('FormulirsEditCtrl', ['$state', '$scope', 'formulirs', 'SweetAlert', 'toaster', '$stateParams', function ($state, $scope, formulirs, SweetAlert, toaster, mdToast, $stateParams) {
    $scope.id = $scope.$stateParams.id;
    //edit formulirs
    //If Id is empty, then redirected
    if ($scope.id == null || $scope.id == '') {
        $state.go("app.formulirs")
    }

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

    //Init input form variable
    $scope.input = {};

    //Set process status to false
    $scope.process = false;

    //Init Alert status
    $scope.alertset = {
        show: 'hide',
        class: 'green',
        msg: ''
    };
    //get lass formulirs
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


    //Run Ajax
    formulirs.show($scope.id)
        .success(function (data) {
            $scope.setLoader(false);
            $scope.myModel = data;
            $scope.foto = data.foto_ijazah;
            $scope.images1 = data.foto_ijazah;


        });

    //Submit Data
    $scope.updateData = function () {
        $scope.alerts = [];
        //Set process status
        $scope.process = true;

        //Close Alert
        // $scope.alertset.show = 'hide';

        //Check validation status
        if ($scope.Form.$valid) {
            //run Ajax
                if ($scope.foto == $scope.images1) {

                    formulirs.update($scope.myModel)
                        .success(function (data) {
                            if (data.updated == true) {
                                //If back to list after submitting
                                //Redirect to akun
                                window.location = "/pendaftaran#/app/formulirs/" + $scope.myModel.biodatas_id;

                                $scope.toaster = {
                                    type: 'success',
                                    title: 'Sukses',
                                    text: 'Update Data Berhasil!'
                                };
                                toaster.pop($scope.toaster.type, $scope.toaster.title, $scope.toaster.text);

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
                                text: 'Update Data Gagal!'
                            };
                            toaster.pop($scope.toaster.type, $scope.toaster.title, $scope.toaster.text);
                        });
                }
                else {

                    var file1 = $scope.image1;
                    //console.log(file)
                    $scope.myModel.foto = file1.name;

                    formulirs.uploadFile1(file1)
                        .success(function (data) {
                            if (data.created == true) {
                                formulirs.update($scope.myModel)

                                //If back to list after submitting
                                //Redirect to akun
                                window.location = "/pendaftaran#/app/formulirs/" + $scope.myModel.biodatas_id;

                                $scope.toaster = {
                                    type: 'success',
                                    title: 'Sukses',
                                    text: 'Update Data Berhasil!'
                                };
                                toaster.pop($scope.toaster.type, $scope.toaster.title, $scope.toaster.text);

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
                                text: 'Update Data Gagal!'
                            };
                            toaster.pop($scope.toaster.type, $scope.toaster.title, $scope.toaster.text);
                        });
                }
        }
    };

}]);