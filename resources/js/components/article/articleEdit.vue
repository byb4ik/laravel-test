<template>
    <div>
        <div class="form-group">
            <router-link to="/" class="btn btn-primary">Назад</router-link>
        </div>

        <div class="panel panel-default">

            <div class="panel-body">
                <form v-on:submit="saveForm()">
                    <div class="row">
                        <div class="col-12">
                            <label class="control-label">Редактировать</label>
                            <textarea v-model="article.full_article" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-5">
                            <label class="control-label">Пользователь</label>
                            <input type="text" v-model="article.user.name" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-5">
                            <label class="control-label">Категория</label>
                            <input type="text" v-model="article.category.name" class="form-control">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <button class="btn btn-success">Сохранить</button>
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
