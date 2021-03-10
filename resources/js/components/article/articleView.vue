<template>
    <div class="panel panel-default">

        <div class="form-group">
            <router-link to="/" class="btn btn-primary">Назад</router-link>
        </div>

        <h2>{{ article.title }}</h2>

        <b>Написал: {{ article.user.name }}</b>
        <b>Рейтинг: {{ JSON.parse(article.rating).length }}</b>

        <a href="#"
           class="badge badge-pill badge-info"
           v-on:click="Like(article.id, article.user_id)">
            LIKE
        </a>
        <br>
        <p>{{ article.full_article }}</p>

                        <router-link :to="{name: 'articleEdit', params: {id: article.id}}"
                                     class="btn btn-xs btn-warning btn-sm">
                            Редактировать
                        </router-link>
                        <a href="#"
                           class="btn btn-xs btn-danger btn-sm"
                           v-on:click="deleteEntry(article.id, index)">
                            Удалить
                        </a>

        </div>
</template>

<script>
export default {
    data: function () {
        return {
            article: []
        }
    },
    mounted() {
        var app = this;
        let id = app.$route.params.id;

        axios.get('/article/' + id)
            .then(function (resp) {
                app.article = resp.data;
            })
            .catch(function (resp) {
                console.log(resp);
                alert("Не могу загрузить");
            });
    },
    methods: {
        deleteEntry(id, index) {
            if (confirm("Хотите удалить?")) {
                const app = this;
                axios.delete('/article/' + id)
                    .then(function (resp) {
                        app.articles.splice(index, 1);
                    })
                    .catch(function (resp) {
                        alert("Не могу удалить");
                    });
            }
        },
        Like(id, user_id) {
                const app = this;
                axios.get('/article/' + id + '/' + user_id)
                    .then(function (resp) {
                        app.article = resp.data;
                    })
                    .catch(function (resp) {
                        alert("Не удалось");
                    });
        }
    },
}
$http.get('api/user').then(response => {
    console.log(response.body);
})
</script>
