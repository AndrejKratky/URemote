$(document).ready(function() {
    let rating = 0;

    $(".star-container i").hover(
        function() {
            let hoverRating = $(this).index() + 1;
            $(".star-container i:lt(" + hoverRating + ")").removeClass("far").addClass("fas");
            $(".star-container i:gt(" + (hoverRating - 1) + ")").removeClass("fas").addClass("far");
        },
        function() {
            $(".star-container i").removeClass("fas").addClass("far");
            $(".star-container i:lt(" + rating + ")").removeClass("far").addClass("fas");
        }
    );

    $(".star-container i").click(function() {
        rating = $(this).index() + 1;
        $(".star-container").attr("data-rating", rating);
    });

    $(".star-container").mouseleave(function() {
        $(".star-container i").removeClass("fas").addClass("far");
        $(".star-container i:lt(" + rating + ")").removeClass("far").addClass("fas");
    });

    $("form").submit(function(event) {
        event.preventDefault(); // Prevent the default form submission

        let reviewText = $("#reviewText").val().trim();
        let warningContainer = $("#warningContainer");

        if (reviewText === '' || rating === 0) {
            warningContainer.html('<div class="alert alert-warning" role="alert">Vyplňte hodnotenie, prosím!</div>');
        } else {
            warningContainer.empty();
            $.ajax({
                type: "POST",
                url: $(this).attr("action"),
                data: {
                    rating: rating,
                    reviewText: reviewText
                },
                success: function(response) {
                    console.log(response);
                    window.location.href = '/home';
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }
    });
});
