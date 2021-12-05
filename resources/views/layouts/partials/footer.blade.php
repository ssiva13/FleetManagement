
<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                © {{  date('Y', strtotime('-2 year')) }} - {{  date('Y') }}  <span class="d-none d-sm-inline-block"> - {{ env('APP_NAME') }}.</span>
            </div>
        </div>
    </div>
</footer>