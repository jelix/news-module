(function(){

    let automaticSlugUrl = false;

    /**
     * @param {String} str
     */
    function textToSlug(str)
    {
        str = str.replace(/ +/gi, '-');
        str = str.toLowerCase();
        return str.trim();
    }

    window.addEventListener("load", (event) => {

        jFormsJQ.onFormReady('jforms_news_admin_news', function(newsForm){
            let titleInput = newsForm.element.elements['title'];
            let slugInput = newsForm.element.elements['slugurl'];
            if (slugInput.value === '' || slugInput.value === textToSlug(titleInput.value) ) {
                automaticSlugUrl = true;
                titleInput.addEventListener("input", (event) => {
                    if (automaticSlugUrl) {
                        slugInput.value = textToSlug(titleInput.value);
                    }
                });

                slugInput.addEventListener("input", (event) => {
                    automaticSlugUrl = ( slugInput.value === '' || slugInput.value === textToSlug(titleInput.value));
                });
            }
        })
    });

})();
