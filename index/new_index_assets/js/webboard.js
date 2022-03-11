function get_plain_text(str) {
    return str.replace(/&nbsp;/g, '<br />').replace(/<(.|\n)*?>/g, '');
}

var app = new Vue({
    el: '#app',
    data: {
        language: 'th',
        now: Date.now(),
        isLoggedIn: false,
        user_name: '',
        userMenu: [],
        navButtonsA: [
            { textTH: "ข่าวประชาสัมพันธ์", textEN: 'Events', url: "../index/news.php?group=1" },
            { textTH: "ประกาศระดับปริญญาตรี", textEN: 'News (Undergraduate)', url: "../index/news.php?group=2" },
            { textTH: "ประกาศระดับบัณฑิตศึกษา", textEN: 'News (Graduate)', url: "../index/news.php?group=4" },
        ],
        navButtonsB: [
            { textTH: "เว็บบอร์ด", textEN: 'Webboard', url: "../index/webboard.php?group=1" },
        ],
        newsGrad: [],
        newsBachelor: [],
        announceNow: [],
        announce: [],
        postAll: [],
    },
    computed: {
        navButtonsAll: function () {
            return this.navButtonsA.concat(this.navButtonsB);
        },
        currentDateTime: function () {
            return dayjs(this.now).format('D MMMM YYYY, h:mm:ss a')
        },
        commentUp: function () {
            return this.newsGrad.concat(this.newsBachelor);
        },
    },
    methods: {
        changeLanguage: function (lang) {
            this.language = lang;
            axios.post('webboard_api.php?function=set-language&lang=' + lang)
                .then(function (response) {
                    this.language = lang;
                    document.getElementById('iContent').contentWindow.location.reload();
                })
                .catch(function (error) {
                    alert(JSON.stringify(error.response.data.message))
                });
        },
        setHit: function (date) {
            axios.post('webboard_api.php?function=set-hit&date=' + date)
                .then(function (response) {
                    return response;
                })
                .catch(function (error) {
                    alert(JSON.stringify(error.response.data.message))
                });
        },
        submit_post: function (obj) {
            $(obj).prop('disabled', true);
            var topic = $.trim($('#topic').val());
            var icon = $.trim($("input[type='radio']:checked").val());
            var detail = $.trim($('#detail').val());
            if (topic.length < 3 || detail.length < 3) {
                alert('กรอกข้อมูลให้ครบถ้วนด้วย+++');
                $(obj).prop('disabled', false);
            } else {
                var email = $.trim($('#email').val());
                $('#bt_post').html('<img src="../images/spinner.gif" width="16" height="16" />');
                axios.post('webboard_api.php?function=submit_post&date=' + date + '&topic=' + topic + '&detail=' + detail, {
                })
                //$.post("webboard_ajax.php", {
                //    'group_id': $('#group_id').val(),
                //    'icon': icon,
                //    'topic': topic,
                //    'detail': detail,
                //    'announcer': announcer,
                //    'email': email
                //}, function(data) {
                //    if (data != "") {
                //        $(".wb_header:first").after(data);
                //        MClose();
                //    } else {
                //        MBox('ไม่สามารถบันทึกข้อมูลได้ กรุณาลองใหม่ !!!');
                //    }
                //});
            }
        },
        t: function (eng, th) {
            return this.language === 'en' ? eng : th;
        }
    },
    mounted: function () {
        var self = this;
        axios.get('webboard_api.php', {
            params: {
                function: 'get-news',
                group: 2,
            }
        })
            .then(function (response) {
                if (response.data) {
                    self.newsBachelor = response.data.map(function (item) {
                        return {
                            textTH: get_plain_text(item.topic),
                            textEN: get_plain_text(item.topic_en),
                            url: item.link === 1 ? item.detail : item.href,
                            pin: item.pin === '1',
                            views: item.views,
                            date: item.date,
                        }
                    });
                }
            })
            .catch(function (error) {
                alert(JSON.stringify(error.response.data.message))
            });

        // --------------------------

        axios.get('webboard_api.php', {
            params: {
                function: 'get-news',
                group: 4,
            }
        })
            .then(function (response) {
                if (response.data) {
                    self.newsGrad = response.data.map(function (item) {
                        return {
                            textTH: get_plain_text(item.topic),
                            textEN: get_plain_text(item.topic_en),
                            url: item.link === '1' ? item.detail : item.href,
                            pin: item.pin === '1',
                            views: item.views,
                            date: item.date,
                        }
                    });
                }
            })
            .catch(function (error) {
                alert(JSON.stringify(error.response.data.message))
            });

        // --------------------------
        // Major

        axios.get('webboard_api.php', {
            params: {
                function: 'get-news',
                group: 3,
            }
        })
            .then(function (response) {
                if (response.data) {
                    self.announceNow = response.data.map(function (item) {
                        return {
                            textTH: get_plain_text(item.topic),
                            textEN: get_plain_text(item.topic_en),
                            url: item.detail,
                            views: item.views,
                            date: item.date,
                        }
                    });
                }
            })
            .catch(function (error) {
                alert(JSON.stringify(error.response.data.message))
            });

        axios.get('webboard_api.php', {
            params: {
                function: 'get-news',
                group: 1,
            }
        })
            .then(function (response) {
                if (response.data) {
                    self.announce = response.data.map(function (item) {
                        return {
                            textTH: get_plain_text(item.topic),
                            textEN: get_plain_text(item.topic_en),
                            url: item.detail,
                            views: item.views,
                            date: item.date,
                        }
                    });
                }
            })
            .catch(function (error) {
                alert(JSON.stringify(error.response.data.message))
            });

        // --------------------------
        // info

        axios.get('webboard_api.php', {
            params: {
                function: 'get-info',
            }
        })
            .then(function (response) {
                if (response.data && response.data.logged_in) {
                    self.isLoggedIn = true;
                    self.server_no = response.data.server_no;
                    self.user_name = response.data.user_id;
                    self.privilege = response.data.privilege;

                    self.userMenu = response.data.user_menu;
                }

                self.now = dayjs.unix(response.data.timestamp);
                setInterval(function () {
                    self.now = self.now.add(1, 'second');
                }, 1000)
            })
            .catch(function (error) {
                alert(JSON.stringify(error.response.data.message))
            });

        // --------------------------
        // language

        axios.get('webboard_api.php', {
            params: {
                function: 'get-language',
            }
        })
            .then(function (response) {
                if (response.data) {
                    self.language = response.data.lang;
                }
            })
            .catch(function (error) {
                alert(JSON.stringify(error.response.data.message))
            });

        // --------------------------
        // post
        axios.get('webboard_api.php', {
            params: {
                function: 'get-post',
                group: 1,
            }
        })
            .then(function (response) {
                if (response.data) {
                    self.postAll = response.data.map(function (item) {
                        return {
                            topic: get_plain_text(item.topic),
                            detail: item.detail,
                            url: item.href,
                            views: item.views,
                            date: item.date,
                            count: item.count,
                            commentDate: item.maxDate,
                        }
                    });
                }
            })
            .catch(function (error) {
                alert(JSON.stringify(error.response.data.message))
            });
    }
})
