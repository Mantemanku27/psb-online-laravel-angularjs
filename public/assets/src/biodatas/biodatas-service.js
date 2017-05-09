/**
 * Created by - LENOVO - on 24/08/2015.
 */
app.factory('biodatas', ['$http', function ($http) {
    return {
        // get data dengan pagination dan pencarian data
        get: function (page, term) {
            return $http({
                method: 'get',
                url: '/api/biodatas?page=' + page + '&term=' + term,
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'}
            });
        },
        getListjurusan: function () {
            return $http({
                method: 'get',
                url: '/api/getList-jurusan',
            });
        },
        getbatasinput: function () {
            return $http({
                method: 'get',
                url: '/api/batas-input-biodatas',
            });
        },
        getidbiodatas: function () {
            return $http({
                method: 'get',
                url: '/api/getidbiodatas',
            });
        },

        //Simpan data
        store: function (inputData) {
            return $http({
                method: 'POST',
                url: '/api/biodatas',
                data: $.param(inputData)
            });
        },

        //Tampil Data
        show: function (_id) {
            return $http({
                method: 'get',
                url: '/api/biodatas/' + _id,
            });
        },

        destroy: function (_id) {
            return $http({
                method: 'delete',
                url: '/api/biodatas/' + _id,
            });
        },

        //Update data
        update: function (inputData) {
            return $http({
                method: 'put',
                url: '/api/biodatas/' + inputData.id,
                data: $.param(inputData)
            });
        },
        kunci: function (_id) {
            return $http({
                method: 'put',
                url: '/api/kunci-biodatas/' + _id
            });
        },

    }
}]);