<template>
    <div>
        <div class="form-group">
            <router-link to="/" class="btn btn-primary">Назад</router-link>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">Добавить сообщение</div>
            <div class="panel-body">
                <form v-on:submit="saveForm()">
                    <div class="row">
                        <div class="col-12">
                            <label class="control-label">Краткое описание</label>
                            <input type="text" v-model="article.short_article" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label class="control-label">Сообщение</label>
                            <input type="text" v-model="article.full_article" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-5">
                            <label class="control-label">Пользователь</label>
                            <input type="text" v-model="article.user_id" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-5">
                            <label class="control-label">Категория</label>
                            <input type="text" v-model="article.category_id" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <button class="btn btn-success">Добавить</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    mounted() {
        let app = this;
        let id = app.$route.params.id;
        axios.get('/article/' + id)
            .then(function (resp) {
                app.article = resp.data;
            })
            .catch(function () {
                alert("Не могу добавить сообщение!")
            });
    },
    data: function () {
        return {
            articleIndex: null,
            article: {
                short_article: '',
                full_article: '',
                user_id: '',
                category_id: '',
            }
        }
    },
    methods: {
        saveForm() {
            event.preventDefault();
            var app = this;
            var newArticle = app.article;
            axios.put('/article/' + app.articleIndex, newArticle)
                .then(function (resp) {
                    app.$router.replace('/');
                })
                .catch(function (resp) {
                    console.log(resp);
                    alert("Не могу отредактировать");
                });
        }
    }
}
</script>
