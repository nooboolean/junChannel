@section('footer')
    <footer class="footer bg-white mt-5">
        <div class="container">
            <div class="text-muted pt-3 pb-3">
                <div class="text-center" style="text-indent:-3em;">
                    <a href="{{ url('tos') }}" role="button" class="btn btn-link text-muted">利用規約</a>
                </div>
                <div class="text-center">
                    <a href="{{ url('privacy-policy') }}" role="button" class="btn btn-link text-muted">プライバシーポリシー</a>
                </div>
                <div class="text-center" style="text-indent:-2em;">
                    <a href="{{ url('#') }}" role="button" class="btn btn-link text-muted">お問い合わせ</a>
                </div>
                <small class="d-block text-center" style="padding-left:12px; text-indent:-2em;"">Copyright © 2020-2022 nakazaway & jump All Rights Reserved.</small>
            </div>
        </div>
    </footer>
@endsection
