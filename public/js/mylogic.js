        $(".update-item").click(function (e) {
            console.log("I was clicked 1");
            e.preventDefault();
            var ele = $(this);

            $.ajax({
                url: "update-cart",
                method: "patch",
                data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), stock: ele.parents("tr").find(".stock").val()},
                success: function (response) {
                    window.location.reload();
                },
                error:function(err){
                    console.error(err);
                }
            });
        });

        $(".delete-item").click(function (e) {
            console.log("I was clicked 2");
            e.preventDefault();

            var ele = $(this);
            if(confirm("Are you sure")) {
                $.ajax({
                    url: "remove-from-cart",
                    method: "delete",
                    data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                    success: function (response) {
                        window.location.reload();
                    },
                    error:function(err){
                        console.error(err);
                    }
                });
            }
        });

          $('.dropdown-trigger').dropdown();

          function handleFiles(event) {
            var files = event.target.files;
            $("#rlly").attr("src", URL.createObjectURL(files[0]));
            document.getElementById("rllly").load();
        }

        document.getElementById("rll").addEventListener("change", handleFiles, false);

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#pic')
                        .attr('src', e.target.result)
                        .width(480)
                        .height(360);
                };

                reader.readAsDataURL(input.files[0]);
                return input;
            }
        }

    //     function matching()
    //     {
    //             if ("#pic","public_coffee.jpg")
    //             {
    //                 var x = document.createElement("IMG");
    //                 x.setAttribute("src", "public_coffee.jpg");
    //                 x.setAttribute("width", "480");
    //                 x.setAttribute("height", "360");
    //                 document.body.appendChild(x);
    //             }
    //             else if("#pic","public_tea.jpg")
    //             {
    //                 var x = document.createElement("IMG");
    //                 x.setAttribute("src", "public_tea.jpg");
    //                 x.setAttribute("width", "480");
    //                 x.setAttribute("height", "360");
    //                 document.body.appendChild(x);
    //             }
    //             else if("#pic","public_hamburger.jpg")
    //             {
    //                 var x = document.createElement("IMG");
    //                 x.setAttribute("src", "public_hamburger.jpg");
    //                 x.setAttribute("width", "480");
    //                 x.setAttribute("height", "360");
    //                 document.body.appendChild(x);
    //             }
    //             else if("#pic"=="")
    //             {
    //                 var message;
    //                 message = "NO IMAGES UPLOADED";
    //             }
    // }

        function audio_check()
        {

        }
