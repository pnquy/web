<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Sản Phẩm - MTP</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/ListSp.css">
    <link rel="stylesheet" href="../../css/style.css">
    <style>
        .form-check { margin-bottom: 5px; }
        .form-check-label { cursor: pointer; color: #555; font-size: 14px; }
        .form-check-input:checked { background-color: #CF7486; border-color: #CF7486; }
        .h6-title { color: #CF7486; font-weight: 700; margin-bottom: 15px; font-size: 16px; border-bottom: 1px solid #eee; padding-bottom: 5px; }
        .col-menu { padding: 20px; background: #fff; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.05); }
    </style>
</head>

<body>
    <div class="container container-list">
        <div class="row">
            <div class="col-lg-3 col-md-4 mb-4">
                <div class="col-menu">
                    <div class="mb-4">
                        <h6 class="h6-title">GIỚI TÍNH</h6>
                        <div class="form-check">
                            <input class="form-check-input common_selector gender" type="checkbox" value="Nam" id="gender_nam">
                            <label class="form-check-label" for="gender_nam">Nam</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input common_selector gender" type="checkbox" value="Nữ" id="gender_nu">
                            <label class="form-check-label" for="gender_nu">Nữ</label>
                        </div>
                    </div>

                    <div class="mb-4">
                        <h6 class="h6-title">LOẠI GIÀY</h6>
                        <div class="form-check">
                            <input class="form-check-input common_selector style" type="checkbox" value="style1" id="style_bongda">
                            <label class="form-check-label" for="style_bongda">Bóng đá</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input common_selector style" type="checkbox" value="style2" id="style_bongro">
                            <label class="form-check-label" for="style_bongro">Bóng rổ</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input common_selector style" type="checkbox" value="style3" id="style_gym">
                            <label class="form-check-label" for="style_gym">Gym</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input common_selector style" type="checkbox" value="style4" id="style_chaybo">
                            <label class="form-check-label" for="style_chaybo">Chạy bộ</label>
                        </div>
                    </div>

                    <div class="mb-4">
                        <h6 class="h6-title">THƯƠNG HIỆU</h6>
                        <div class="form-check">
                            <input class="form-check-input common_selector brand" type="checkbox" value="dongsp1" id="brand_nike">
                            <label class="form-check-label" for="brand_nike">Nike</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input common_selector brand" type="checkbox" value="dongsp2" id="brand_adidas">
                            <label class="form-check-label" for="brand_adidas">Adidas</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input common_selector brand" type="checkbox" value="dongsp3" id="brand_bitis">
                            <label class="form-check-label" for="brand_bitis">Biti's</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input common_selector brand" type="checkbox" value="dongsp4" id="brand_puma">
                            <label class="form-check-label" for="brand_puma">Puma</label>
                        </div>
                    </div>

                    <div class="mb-4">
                        <h6 class="h6-title">MỨC GIÁ</h6>
                        <div class="form-check">
                            <input class="form-check-input common_selector price" type="checkbox" value="0-200000" id="price_1">
                            <label class="form-check-label" for="price_1">Dưới 200.000đ</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input common_selector price" type="checkbox" value="200000-500000" id="price_2">
                            <label class="form-check-label" for="price_2">200k - 500k</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input common_selector price" type="checkbox" value="500000-1000000" id="price_3">
                            <label class="form-check-label" for="price_3">500k - 1 triệu</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input common_selector price" type="checkbox" value="1000000-50000000" id="price_4">
                            <label class="form-check-label" for="price_4">Trên 1 triệu</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-9 col-md-8">
                <div class="row right-item">
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        $(document).ready(function(){

            function get_filter(class_name) {
                var filter = [];
                $('.' + class_name + ':checked').each(function() {
                    filter.push($(this).val());
                });
                return filter;
            }

            function filter_data() {
                $('.right-item').css('opacity', '0.5');

                var action = 'fetch_data';
                var brand = get_filter('brand');
                var style = get_filter('style');
                var gender = get_filter('gender');
                var price = get_filter('price');

                const urlParams = new URLSearchParams(window.location.search);
                var is_sale = urlParams.get('sale');

                $.ajax({
                    url: "pages/main/xuli_boloc.php",
                    method: "POST",
                    data: {
                        action: action,
                        brand: brand,
                        style: style,
                        gender: gender,
                        price: price,
                        is_sale: is_sale
                    },
                    success: function(data) {
                        $('.right-item').html(data);
                        $('.right-item').css('opacity', '1');
                    }
                });
            }

            const urlParams = new URLSearchParams(window.location.search);
            
            if(urlParams.has('brand')){
                let val = urlParams.get('brand');
                $(`input.brand[value="${val}"]`).prop('checked', true);
            }

            if(urlParams.has('gender')){
                let val = urlParams.get('gender');
                $(`input.gender[value="${val}"]`).prop('checked', true);
            }

            if(urlParams.has('style')){
                let val = urlParams.get('style');
                $(`input.style[value="${val}"]`).prop('checked', true);
            }

            $('.common_selector').click(function(){
                filter_data();
            });

            filter_data();
        });
    </script>
</body>
</html>