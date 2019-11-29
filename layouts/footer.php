        <!-- Footer -->
        <footer class="py-5 bg-dark">
            <div class="container">
                <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
            </div>
            <!-- /.container -->
        </footer>

        <!-- Bootstrap core JavaScript -->
        <script src="public/vendor/jquery/jquery.min.js"></script>
        <script src="public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <script>
            function addCart(id){
                $.post("shoppingCart.php", {'id':id}, function(data, status){
                    item = data.split("-");
                    $("#soluong").text(item[0]);
                    $("#tonggia").text(item[1]);
                });
            }

            function editCart(id){
                num = $("#num_"+id).val();
                $.post("editCart.php", {'id':id, 'num':num}, function(data, status){
                    $("#listCart").load("/cart/giohang.php #listCart");
                });
            }

            function deleteCart(id){
                $.post("editCart.php", {'id':id, 'num':0}, function(data, status){
                    $("#listCart").load("/cart/giohang.php #listCart");
                });
            }
        </script>

    </body>

    </html>