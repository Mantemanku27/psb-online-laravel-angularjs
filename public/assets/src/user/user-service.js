app.factory('user', ['$http', function ($http) {

    return {
        //Get List Urusan


        getUptd: function (id) {
            return $http({
                method: 'get',
                url: '/api/v1/get-list-uptd/' + id
            });
        },

        getSkpd: function () {
            return $http({
                method: 'get',
                url: '/api/v1/get-list-skpd'
            });
        },

        // get data dengan pagination dan pencarian data
        get: function (page, term) {
            return $http({
                method: 'get',
                url: '/api/v1/get-user-by-backoffice?page=' + page + '&term=' + term
            });
        },
        getDetail: function (inputData) {
            return $http({
                method: 'get',
                url: '/api/v1/user-detail'
            });
        },      getlihat: function (inputData) {
            return $http({
                method: 'get',
                url: '/api/v1/get-session-user'
            });
        },

        //Simpan data
        store: function (inputData) {
            return $http({
                method: 'POST',
                url: '/api/v1/create-by-back-office',
                data: $.param(inputData)
            });
        },
        //Tampil Data
        show: function (_id) {
            return $http({
                method: 'get',
                url: '/api/v1/user/' + _id
            });
        },

        destroy: function (_id) {
            return $http({
                method: 'delete',
                url: '/api/v1/user/' + _id
            });
        },

        update: function (inputData) {
            return $http({
                method: 'put',
                url: '/api/v1/update-by-back-office/' + inputData.id,
                data: $.param(inputData)
            });
        },
        updateIsaktif: function (inputData) {
            return $http({
                method: 'put',
                url: '/api/v1/is-active/' + inputData.id,
                data: $.param(inputData)
            });
        },
        detail: function (_id) {
            return $http({
                method: 'get',
                url: '/api/v1/user/' + _id,
            });
        },
        //Update data
        gantiPass: function (inputData) {
            return $http({
                method: 'put',
                url: '/api/v1/update-pass/',
                data: $.param(inputData)
            });
        },
        kunci: function (_id) {
            return $http({
                method: 'put',
                url: '/api/v1/kunci-user/' + _id
            });
        },
        aktif: function (_id) {
            return $http({
                method: 'put',
                url: '/api/v1/aktif-user/' + _id
            });
        },
        getbatas: function () {
            return $http({
                method: 'put',
                url: '/api/v1/getbatas-user'
            });
        },

    }
}]);