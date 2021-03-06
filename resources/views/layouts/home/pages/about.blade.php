@extends('layouts.home.layouts.master')

@section('title', 'NewTime Hotel - Về chúng tôi')

@section('content')
    <div class="block-30 block-30-sm item" style="background-image: url('{{ asset('assets/home/images/bg_2.jpg') }}');"
         data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-10">
                    <span class="subheading-sm">Về chúng tôi</span>
                    <h2 class="heading">NewTime Hotel</h2>
                </div>
            </div>
        </div>
    </div>


    <div class="site-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-12">
                    <img src="{{ asset('assets/home/images/bg_1.jpg') }}" alt="NewTime Hotel" class="img-fluid">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mb-3">
                    <h2>Enjoy a Luxury Experience</h2>
                </div>
                <div class="col-md-6">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni, necessitatibus officiis facere nisi
                        et, ut adipisci a quis quisquam vitae doloremque tempora repellat quae accusantium atque eum
                        voluptatibus aperiam cumque.</p>
                    <p>Quia ratione, eum harum ab similique mollitia, nisi itaque vel voluptas ipsam dolore perferendis.
                        Deleniti voluptatum error possimus ipsum, sed, obcaecati. Sit unde quia eum repudiandae molestiae
                        reprehenderit harum nesciunt.</p>
                    <p>Pariatur non consectetur libero, veniam inventore officia neque ipsum vel vitae repudiandae doloribus
                        odit nihil dicta sit, magnam eos, in asperiores consequuntur eaque atque nam error. Dignissimos
                        porro veniam voluptate.</p>
                </div>
                <div class="col-md-6">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni, necessitatibus officiis facere nisi
                        et, ut adipisci a quis quisquam vitae doloremque tempora repellat quae accusantium atque eum
                        voluptatibus aperiam cumque.</p>
                    <p>Quia ratione, eum harum ab similique mollitia, nisi itaque vel voluptas ipsam dolore perferendis.
                        Deleniti voluptatum error possimus ipsum, sed, obcaecati. Sit unde quia eum repudiandae molestiae
                        reprehenderit harum nesciunt.</p>
                </div>

            </div>
        </div>
    </div>

@endsection
