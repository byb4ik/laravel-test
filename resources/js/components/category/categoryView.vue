<template>
    <div class="row">
        <div class="form-group">
            <router-link to="/">Назад</router-link>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">Список сообщений</div>
            <div class="panel-body">

                <tr v-for="article, index in articles">
                    <h3>{{ article.title }}</h3>
                    <b>{{ article.user.name }} </b>
                    <b>Рейтинг: {{ JSON.parse(article.rating).length }}</b>
                    <p>{{ article.short_article }}
                        <router-link :to="{name: 'articleView', params: {id: article.id}}">
                            <a>Читать полностью</a>
                        </router-link>
                    </p>

                    <!--                        <p>Проголосовало: {{ JSON.parse(article.rating).length }}</p>-->
                </tr>


            </div>
        </div>
    </div>
</template>

<script>

export default {
    data: function () {
        return {
            articles: []
        }
    },
    mounted() {
        const app = this;
        let id = app.$route.params.id;
        axios.get('/articles-by-category/' + id)
            .then(function (resp) {
                app.articles = resp.data;
            })
            .catch(function (resp) {
                console.log(resp);
                alert("Не могу загрузить");
            });
    },
}
</script>
