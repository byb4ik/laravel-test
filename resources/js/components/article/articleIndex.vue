<template>
    <div class="container">
        <div class="form-group">
            <router-link to="/">Назад</router-link>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">Список категорий</div>
            <div class="panel-body">


                <tr v-for="article, index in articles">
                    <h3>
                        <router-link :to="{name: 'categoryView', params: {id: article.category_id}}">
                            <a>{{ article.category.name }} </a>
                        </router-link>
                        >> {{ article.title }}
                    </h3>
<!--                    <b>{{ article.user.name }} </b>-->
<!--                    <p>{{ article.short_article }}-->
<!--                        <router-link :to="{name: 'articleView', params: {id: article.id}}">-->
<!--                            <a>Читать полностью</a>-->
<!--                        </router-link>-->
<!--                    </p>-->

                    <!--                        <p>Проголосовало: {{ JSON.parse(article.rating).length }}</p>-->

<!--                    <router-link :to="{name: 'articleEdit', params: {id: article.id}}"-->
<!--                                 class="btn btn-xs btn-warning btn-sm">-->
<!--                        Редактировать-->
<!--                    </router-link>-->

<!--                    <a href="#"-->
<!--                       class="btn btn-xs btn-danger btn-sm"-->
<!--                       v-on:click="deleteEntry(article.id, index)">-->
<!--                        Удалить-->
<!--                    </a>-->

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
        axios.get('/article/')
            .then(function (resp) {
                app.articles = resp.data;
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
        }
    },
}
</script>
