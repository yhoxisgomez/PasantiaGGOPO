@extends('adminlte::auth.login')

<style>
	.login-page{
		background-image: url(../img/sidebar-5.jpg) !important;
	}
	a {
		color:#FFF !important;
    }
    .btn-primary {
    color: #fff;
    background-color: #a1a147 !important;
    border-color: #a1a147 !important;
    box-shadow: none;
    }
    .btn-info {
    color: #fff !important;
    background-color: #d7d7a8 !important;
    border-color: #d7d7a8 !important;
    }

    .btn-info:hover {
    color: #fff !important;
    background-color: #c9c96d !important;
    border-color: #c9c96d !important;
    }

    .btn-info:focus, .btn-info.focus {
    color: #fff !important;
    background-color:#c9c96d !important;
    border-color: #c9c96d !important;
    box-shadow: 0 0 0 0.2rem #c9c96d !important;
    }

    .btn-info.disabled, .btn-info:disabled {
    color: #fff !important;
    background-color: #c9c96d !important;
    border-color: #c9c96d !important;
    }

    .text-info {
    color: #d7d7a8!important;
}

    a.text-info:hover, a.text-info:focus {
    color: #c9c96d !important;
    }
</style>
