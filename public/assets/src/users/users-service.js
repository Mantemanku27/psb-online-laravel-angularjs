/**
 * Created by - LENOVO - on 24/08/2015.
 */
app.factory('users', ['$http', function ($http) {
    return {
        // get data dengan pagination dan pencarian data
        get: function (page, term) {
            return $http({
                method: 'get',
                url: '/api/users?page=' + page + '&term=' + term,
                headers: { 'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest' }
            });
        },

        getLastusers: function () {
            return $http({
                method: 'get',
                url: '/api/get-last-users',
            });
        },

        //Simpan data
        store: function (inputData) {
            return $http({
                method: 'POST',
                url: '/api/users',
                data: $.param(inputData)
            });
        },

        //Tampil Data
        show: function (_id) {
            return $http({
                method: 'get',
                url: '/api/users/' + _id,
            });
        },

        destroy: function (_id) {
            return $http({
                method: 'delete',
                url: '/api/users/' + _id,
            });
        },

        //Update data
        update: function (inputData) {
            return $http({
                method: 'put',
                url: '/api/users/' + inputData.id,
                data: $.param(inputData)
            });
        },
        kunci: function (_id) {
            return $http({
                method: 'put',
                url: '/api/kunci-users/' + _id
            });
        },

    }
}]);