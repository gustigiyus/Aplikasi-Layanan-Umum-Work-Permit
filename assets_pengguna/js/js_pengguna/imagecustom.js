'use strict';

// Class definition
var KTImageInputDemo = function () {
	// Private functions
	var initDemos = function () {

        // Example 1
        var avatar1 = new KTImageInput('image_kt-1');

        avatar1.on('cancel', function(imageInput) {
            swal.fire({
                title: 'Gambar berhasil dibatalkan !',
                type: 'success', 
                buttonsStyling: false,
                confirmButtonText: 'Ok, mengerti!',
                confirmButtonClass: 'btn btn-primary font-weight-bold'
            });
        });

        avatar1.on('change', function(imageInput) {
            swal.fire({
                title: 'Gambar berhasil ditambahkan !',
                type: 'success',
                buttonsStyling: false,
                confirmButtonText: 'Ok, mengerti!',
                confirmButtonClass: 'btn btn-primary font-weight-bold'
            });
        });

        avatar1.on('remove', function(imageInput) {
            swal.fire({
                title: 'Gambar berhasil dihapaus !',
                type: 'error',
                buttonsStyling: false,
                confirmButtonText: 'Mengerti!',
                confirmButtonClass: 'btn btn-primary font-weight-bold'
            });
        });

        // Example 2
        var avatar4 = new KTImageInput('image_kt-2');

        avatar4.on('cancel', function(imageInput) {
            swal.fire({
                title: 'Gambar berhasil dibatalkan !',
                type: 'success', 
                buttonsStyling: false,
                confirmButtonText: 'Ok, mengerti!',
                confirmButtonClass: 'btn btn-primary font-weight-bold'
            });
        });

        avatar4.on('change', function(imageInput) {
            swal.fire({
                title: 'Gambar berhasil ditambahkan !',
                type: 'success',
                buttonsStyling: false,
                confirmButtonText: 'Ok, mengerti!',
                confirmButtonClass: 'btn btn-primary font-weight-bold'
            });
        });

        avatar4.on('remove', function(imageInput) {
            swal.fire({
                title: 'Gambar berhasil dihapaus !',
                type: 'error',
                buttonsStyling: false,
                confirmButtonText: 'Mengerti!',
                confirmButtonClass: 'btn btn-primary font-weight-bold'
            });
        });

        // Example 3
        var avatar4 = new KTImageInput('image_kt-3');

        avatar4.on('cancel', function(imageInput) {
            swal.fire({
                title: 'Gambar berhasil dibatalkan !',
                type: 'success', 
                buttonsStyling: false,
                confirmButtonText: 'Ok, mengerti!',
                confirmButtonClass: 'btn btn-primary font-weight-bold'
            });
        });

        avatar4.on('change', function(imageInput) {
            swal.fire({
                title: 'Gambar berhasil ditambahkan !',
                type: 'success',
                buttonsStyling: false,
                confirmButtonText: 'Ok, mengerti!',
                confirmButtonClass: 'btn btn-primary font-weight-bold'
            });
        });

        avatar4.on('remove', function(imageInput) {
            swal.fire({
                title: 'Gambar berhasil dihapaus !',
                type: 'error',
                buttonsStyling: false,
                confirmButtonText: 'Mengerti!',
                confirmButtonClass: 'btn btn-primary font-weight-bold'
            });
        });

        // Example 4
        var avatar4 = new KTImageInput('image_kt-4');

        avatar4.on('cancel', function(imageInput) {
            swal.fire({
                title: 'Gambar berhasil dibatalkan !',
                type: 'success', 
                buttonsStyling: false,
                confirmButtonText: 'Ok, mengerti!',
                confirmButtonClass: 'btn btn-primary font-weight-bold'
            });
        });

        avatar4.on('change', function(imageInput) {
            swal.fire({
                title: 'Gambar berhasil ditambahkan !',
                type: 'success',
                buttonsStyling: false,
                confirmButtonText: 'Ok, mengerti!',
                confirmButtonClass: 'btn btn-primary font-weight-bold'
            });
        });

        avatar4.on('remove', function(imageInput) {
            swal.fire({
                title: 'Gambar berhasil dihapaus !',
                type: 'error',
                buttonsStyling: false,
                confirmButtonText: 'Mengerti!',
                confirmButtonClass: 'btn btn-primary font-weight-bold'
            });
        });

        // Example 5
        var avatar4 = new KTImageInput('image_kt-5');

        avatar4.on('cancel', function(imageInput) {
            swal.fire({
                title: 'Gambar berhasil dibatalkan !',
                type: 'success', 
                buttonsStyling: false,
                confirmButtonText: 'Ok, mengerti!',
                confirmButtonClass: 'btn btn-primary font-weight-bold'
            });
        });

        avatar4.on('change', function(imageInput) {
            swal.fire({
                title: 'Gambar berhasil ditambahkan !',
                type: 'success',
                buttonsStyling: false,
                confirmButtonText: 'Ok, mengerti!',
                confirmButtonClass: 'btn btn-primary font-weight-bold'
            });
        });

        avatar4.on('remove', function(imageInput) {
            swal.fire({
                title: 'Gambar berhasil dihapaus !',
                type: 'error',
                buttonsStyling: false,
                confirmButtonText: 'Mengerti!',
                confirmButtonClass: 'btn btn-primary font-weight-bold'
            });
        });

        // Example 6
        var avatar4 = new KTImageInput('image_kt-6');

        avatar4.on('cancel', function(imageInput) {
            swal.fire({
                title: 'Gambar berhasil dibatalkan !',
                type: 'success', 
                buttonsStyling: false,
                confirmButtonText: 'Ok, mengerti!',
                confirmButtonClass: 'btn btn-primary font-weight-bold'
            });
        });

        avatar4.on('change', function(imageInput) {
            swal.fire({
                title: 'Gambar berhasil ditambahkan !',
                type: 'success',
                buttonsStyling: false,
                confirmButtonText: 'Ok, mengerti!',
                confirmButtonClass: 'btn btn-primary font-weight-bold'
            });
        });

        avatar4.on('remove', function(imageInput) {
            swal.fire({
                title: 'Gambar berhasil dihapaus !',
                type: 'error',
                buttonsStyling: false,
                confirmButtonText: 'Mengerti!',
                confirmButtonClass: 'btn btn-primary font-weight-bold'
            });
        });

        // Example 7
        var avatar4 = new KTImageInput('image_kt-7');

        avatar4.on('cancel', function(imageInput) {
            swal.fire({
                title: 'Gambar berhasil dibatalkan !',
                type: 'success', 
                buttonsStyling: false,
                confirmButtonText: 'Ok, mengerti!',
                confirmButtonClass: 'btn btn-primary font-weight-bold'
            });
        });

        avatar4.on('change', function(imageInput) {
            swal.fire({
                title: 'Gambar berhasil ditambahkan !',
                type: 'success',
                buttonsStyling: false,
                confirmButtonText: 'Ok, mengerti!',
                confirmButtonClass: 'btn btn-primary font-weight-bold'
            });
        });

        avatar4.on('remove', function(imageInput) {
            swal.fire({
                title: 'Gambar berhasil dihapaus !',
                type: 'error',
                buttonsStyling: false,
                confirmButtonText: 'Mengerti!',
                confirmButtonClass: 'btn btn-primary font-weight-bold'
            });
        });

        // Example 8
        var avatar4 = new KTImageInput('image_kt-8');

        avatar4.on('cancel', function(imageInput) {
            swal.fire({
                title: 'Gambar berhasil dibatalkan !',
                type: 'success', 
                buttonsStyling: false,
                confirmButtonText: 'Ok, mengerti!',
                confirmButtonClass: 'btn btn-primary font-weight-bold'
            });
        });

        avatar4.on('change', function(imageInput) {
            swal.fire({
                title: 'Gambar berhasil ditambahkan !',
                type: 'success',
                buttonsStyling: false,
                confirmButtonText: 'Ok, mengerti!',
                confirmButtonClass: 'btn btn-primary font-weight-bold'
            });
        });

        avatar4.on('remove', function(imageInput) {
            swal.fire({
                title: 'Gambar berhasil dihapaus !',
                type: 'error',
                buttonsStyling: false,
                confirmButtonText: 'Mengerti!',
                confirmButtonClass: 'btn btn-primary font-weight-bold'
            });
        });

        // Example 9
        var avatar4 = new KTImageInput('image_kt-9');

        avatar4.on('cancel', function(imageInput) {
            swal.fire({
                title: 'Gambar berhasil dibatalkan !',
                type: 'success', 
                buttonsStyling: false,
                confirmButtonText: 'Ok, mengerti!',
                confirmButtonClass: 'btn btn-primary font-weight-bold'
            });
        });

        avatar4.on('change', function(imageInput) {
            swal.fire({
                title: 'Gambar berhasil ditambahkan !',
                type: 'success',
                buttonsStyling: false,
                confirmButtonText: 'Ok, mengerti!',
                confirmButtonClass: 'btn btn-primary font-weight-bold'
            });
        });

        avatar4.on('remove', function(imageInput) {
            swal.fire({
                title: 'Gambar berhasil dihapaus !',
                type: 'error',
                buttonsStyling: false,
                confirmButtonText: 'Mengerti!',
                confirmButtonClass: 'btn btn-primary font-weight-bold'
            });
        });

        // Example 10
        var avatar4 = new KTImageInput('image_kt-10');

        avatar4.on('cancel', function(imageInput) {
            swal.fire({
                title: 'Gambar berhasil dibatalkan !',
                type: 'success', 
                buttonsStyling: false,
                confirmButtonText: 'Ok, mengerti!',
                confirmButtonClass: 'btn btn-primary font-weight-bold'
            });
        });

        avatar4.on('change', function(imageInput) {
            swal.fire({
                title: 'Gambar berhasil ditambahkan !',
                type: 'success',
                buttonsStyling: false,
                confirmButtonText: 'Ok, mengerti!',
                confirmButtonClass: 'btn btn-primary font-weight-bold'
            });
        });

        avatar4.on('remove', function(imageInput) {
            swal.fire({
                title: 'Gambar berhasil dihapaus !',
                type: 'error',
                buttonsStyling: false,
                confirmButtonText: 'Mengerti!',
                confirmButtonClass: 'btn btn-primary font-weight-bold'
            });
        });

        // Example 11
        var avatar4 = new KTImageInput('image_kt-11');

        avatar4.on('cancel', function(imageInput) {
            swal.fire({
                title: 'Gambar berhasil dibatalkan !',
                type: 'success', 
                buttonsStyling: false,
                confirmButtonText: 'Ok, mengerti!',
                confirmButtonClass: 'btn btn-primary font-weight-bold'
            });
        });

        avatar4.on('change', function(imageInput) {
            swal.fire({
                title: 'Gambar berhasil ditambahkan !',
                type: 'success',
                buttonsStyling: false,
                confirmButtonText: 'Ok, mengerti!',
                confirmButtonClass: 'btn btn-primary font-weight-bold'
            });
        });

        avatar4.on('remove', function(imageInput) {
            swal.fire({
                title: 'Gambar berhasil dihapaus !',
                type: 'error',
                buttonsStyling: false,
                confirmButtonText: 'Mengerti!',
                confirmButtonClass: 'btn btn-primary font-weight-bold'
            });
        });

        // Example 12
        var avatar4 = new KTImageInput('image_kt-12');

        avatar4.on('cancel', function(imageInput) {
            swal.fire({
                title: 'Gambar berhasil dibatalkan !',
                type: 'success', 
                buttonsStyling: false,
                confirmButtonText: 'Ok, mengerti!',
                confirmButtonClass: 'btn btn-primary font-weight-bold'
            });
        });

        avatar4.on('change', function(imageInput) {
            swal.fire({
                title: 'Gambar berhasil ditambahkan !',
                type: 'success',
                buttonsStyling: false,
                confirmButtonText: 'Ok, mengerti!',
                confirmButtonClass: 'btn btn-primary font-weight-bold'
            });
        });

        avatar4.on('remove', function(imageInput) {
            swal.fire({
                title: 'Gambar berhasil dihapaus !',
                type: 'error',
                buttonsStyling: false,
                confirmButtonText: 'Mengerti!',
                confirmButtonClass: 'btn btn-primary font-weight-bold'
            });
        });

        // Example 13
        var avatar4 = new KTImageInput('image_kt-13');

        avatar4.on('cancel', function(imageInput) {
            swal.fire({
                title: 'Gambar berhasil dibatalkan !',
                type: 'success', 
                buttonsStyling: false,
                confirmButtonText: 'Ok, mengerti!',
                confirmButtonClass: 'btn btn-primary font-weight-bold'
            });
        });

        avatar4.on('change', function(imageInput) {
            swal.fire({
                title: 'Gambar berhasil ditambahkan !',
                type: 'success',
                buttonsStyling: false,
                confirmButtonText: 'Ok, mengerti!',
                confirmButtonClass: 'btn btn-primary font-weight-bold'
            });
        });

        avatar4.on('remove', function(imageInput) {
            swal.fire({
                title: 'Gambar berhasil dihapaus !',
                type: 'error',
                buttonsStyling: false,
                confirmButtonText: 'Mengerti!',
                confirmButtonClass: 'btn btn-primary font-weight-bold'
            });
        });

        // Example 14
        var avatar4 = new KTImageInput('image_kt-14');

        avatar4.on('cancel', function(imageInput) {
            swal.fire({
                title: 'Gambar berhasil dibatalkan !',
                type: 'success', 
                buttonsStyling: false,
                confirmButtonText: 'Ok, mengerti!',
                confirmButtonClass: 'btn btn-primary font-weight-bold'
            });
        });

        avatar4.on('change', function(imageInput) {
            swal.fire({
                title: 'Gambar berhasil ditambahkan !',
                type: 'success',
                buttonsStyling: false,
                confirmButtonText: 'Ok, mengerti!',
                confirmButtonClass: 'btn btn-primary font-weight-bold'
            });
        });

        avatar4.on('remove', function(imageInput) {
            swal.fire({
                title: 'Gambar berhasil dihapaus !',
                type: 'error',
                buttonsStyling: false,
                confirmButtonText: 'Mengerti!',
                confirmButtonClass: 'btn btn-primary font-weight-bold'
            });
        });

        // Example 15
        var avatar4 = new KTImageInput('image_kt-15');

        avatar4.on('cancel', function(imageInput) {
            swal.fire({
                title: 'Gambar berhasil dibatalkan !',
                type: 'success', 
                buttonsStyling: false,
                confirmButtonText: 'Ok, mengerti!',
                confirmButtonClass: 'btn btn-primary font-weight-bold'
            });
        });

        avatar4.on('change', function(imageInput) {
            swal.fire({
                title: 'Gambar berhasil ditambahkan !',
                type: 'success',
                buttonsStyling: false,
                confirmButtonText: 'Ok, mengerti!',
                confirmButtonClass: 'btn btn-primary font-weight-bold'
            });
        });

        avatar4.on('remove', function(imageInput) {
            swal.fire({
                title: 'Gambar berhasil dihapaus !',
                type: 'error',
                buttonsStyling: false,
                confirmButtonText: 'Mengerti!',
                confirmButtonClass: 'btn btn-primary font-weight-bold'
            });
        });

        // Example 16
        var avatar4 = new KTImageInput('image_kt-16');

        avatar4.on('cancel', function(imageInput) {
            swal.fire({
                title: 'Gambar berhasil dibatalkan !',
                type: 'success', 
                buttonsStyling: false,
                confirmButtonText: 'Ok, mengerti!',
                confirmButtonClass: 'btn btn-primary font-weight-bold'
            });
        });

        avatar4.on('change', function(imageInput) {
            swal.fire({
                title: 'Gambar berhasil ditambahkan !',
                type: 'success',
                buttonsStyling: false,
                confirmButtonText: 'Ok, mengerti!',
                confirmButtonClass: 'btn btn-primary font-weight-bold'
            });
        });

        avatar4.on('remove', function(imageInput) {
            swal.fire({
                title: 'Gambar berhasil dihapaus !',
                type: 'error',
                buttonsStyling: false,
                confirmButtonText: 'Mengerti!',
                confirmButtonClass: 'btn btn-primary font-weight-bold'
            });
        });

        // Example 17
        var avatar4 = new KTImageInput('image_kt-17');

        avatar4.on('cancel', function(imageInput) {
            swal.fire({
                title: 'Gambar berhasil dibatalkan !',
                type: 'success', 
                buttonsStyling: false,
                confirmButtonText: 'Ok, mengerti!',
                confirmButtonClass: 'btn btn-primary font-weight-bold'
            });
        });

        avatar4.on('change', function(imageInput) {
            swal.fire({
                title: 'Gambar berhasil ditambahkan !',
                type: 'success',
                buttonsStyling: false,
                confirmButtonText: 'Ok, mengerti!',
                confirmButtonClass: 'btn btn-primary font-weight-bold'
            });
        });

        avatar4.on('remove', function(imageInput) {
            swal.fire({
                title: 'Gambar berhasil dihapaus !',
                type: 'error',
                buttonsStyling: false,
                confirmButtonText: 'Mengerti!',
                confirmButtonClass: 'btn btn-primary font-weight-bold'
            });
        });

        // Example 18
        var avatar4 = new KTImageInput('image_kt-18');

        avatar4.on('cancel', function(imageInput) {
            swal.fire({
                title: 'Gambar berhasil dibatalkan !',
                type: 'success', 
                buttonsStyling: false,
                confirmButtonText: 'Ok, mengerti!',
                confirmButtonClass: 'btn btn-primary font-weight-bold'
            });
        });

        avatar4.on('change', function(imageInput) {
            swal.fire({
                title: 'Gambar berhasil ditambahkan !',
                type: 'success',
                buttonsStyling: false,
                confirmButtonText: 'Ok, mengerti!',
                confirmButtonClass: 'btn btn-primary font-weight-bold'
            });
        });

        avatar4.on('remove', function(imageInput) {
            swal.fire({
                title: 'Gambar berhasil dihapaus !',
                type: 'error',
                buttonsStyling: false,
                confirmButtonText: 'Mengerti!',
                confirmButtonClass: 'btn btn-primary font-weight-bold'
            });
        });
    }

    
    return {
        // public functions
        init: function() {
            initDemos();
        }
    };
}();

KTUtil.ready(function() {
    KTImageInputDemo.init();
});