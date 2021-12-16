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
            { textTH: "หลักสูตร", textEN: 'Curriculum', url: "../curriculum/" },
            { textTH: "สมัครเรียน", textEN: 'Admission', url: "../KMITL/" },
            {
                textTH: "ตารางเรียน-สอบ", textEN: 'Timetable', url: "#",
                children: [
                    { textTH: "ตารางเรียน", textEN: 'Course Timetable', url: "../teachtable_v20/" },
                    { textTH: "ตารางสอบ", textEN: 'Exam Schedule', url: "../examtable/" },
                ]
            },
            { textTH: "ปฏิทินการศึกษา", textEN: 'Academic Calendar', url: "../educalendar/" },
        ],
        navButtonsB: [
            {
                textTH: "เอกสาร/ข้อมูล", textEN: 'Document/Data', url: "#",
                children: [
                    { textTH: "เอกสาร/ข้อมูล", textEN: 'Document/Data', url: "../rule/" },
                    { textTH: "คู่มือนักศึกษา", textEN: 'Student Handbook', url: "../ebook/" },
                ]
            },
            {
                textTH: "บริการ", textEN: 'Service', url: "#",
                children: [
                    { textTH: "จัดส่งเอกสารทางการศึกษา", textEN: 'KMITL Request Document', url: "service.php" },
                    { textTH: "จัดส่งปริญญาบัตรทางไปรษณีย์", textEN: 'KMITL Degree Certificate', url: "../student_event/KMITL_Degree_Certificate.php" },
                    { textTH: "ข้อตกลงระดับการให้บริการ (SLA)", textEN: 'ข้อตกลงระดับการให้บริการ (SLA)', url: "../SLA/", target: "_blank" },
                ]
            },
            { textTH: "เว็บบอร์ด", textEN: 'Webboard', url: "webboard.php?group=1" },
            { textTH: "ทุนการศึกษา", textEN: 'Scholarship', url: "https://office.kmitl.ac.th/osda/kmitl/" },
            { textTH: "เกี่ยวกับสำนัก", textEN: 'About', url: "../office/" },
        ],
        newsGrad: [],
        announceNow: [],
        
        calenMenu: [
            { yearTH: "2564", yearEN: "2021", graduate : "2564/grad64-th.pdf", underGraduate: '2564/ungrad64-th2.pdf', stuActivity: "2564/ActivityCalendar2021.pdf", url: "javascript:void(0);", target: "_index.php" },
            { yearTH: "2563", yearEN: "2020", graduate : "2563/grad63-th.pdf", underGraduate: '2563/ungrad63-th.pdf', stuActivity: "2563/ActivityCalendar2020.pdf", url: "javascript:void(0);", target: "_index.php" },
            { yearTH: "2562", yearEN: "2019", graduate : "2562/grad62-2-2.pdf", underGraduate: '2562/ungrad62-2-2.pdf', stuActivity: "2562/ActivityCalendar2019.pdf", url: "javascript:void(0);", target: "_index.php" },
            { yearTH: "2561", yearEN: "2018", graduate : "2561/grad61-3.pdf", underGraduate: '2561/ungrad61-3.pdf', stuActivity: "", url: "javascript:void(0);", target: "_index.php" },
            { yearTH: "2560", yearEN: "2017", graduate : "2560/grad2560.pdf", underGraduate: '2560/ungrad2560-2.pdf', stuActivity: "2560/Activity-Calendar-2017.pdf", url: "javascript:void(0);", target: "_index.php" },
            { yearTH: "2559", yearEN: "2016", graduate : "2559/grad2559.pdf", underGraduate: '2559/ungrad2559.pdf', stuActivity: "2559/กิจกรรมนักศึกษา-ระดับปริญญาตรี-ประจำปีการศึกษา-2559edit030659.pdf", url: "javascript:void(0);", target: "_index.php" },
        ],

    },
    computed: {
        navButtonsAll: function () {
            return this.navButtonsA.concat(this.navButtonsB);
        },
        currentDateTime: function () {
            return dayjs(this.now).format('D MMMM YYYY, h:mm:ss a')
        },
    },
    methods: {
        changeLanguage: function (lang) {
            this.language = lang;
            axios.post('index_api.php?function=set-language&lang=' + lang)
                .then(function (response) {
                    this.language = lang;
                })
                .catch(function (error) {
                    alert(JSON.stringify(error.response.data.message))
                });
        },
        t: function (eng, th) {
            return this.language === 'en' ? eng : th;
        },
        getiContent:function (ev,page)
        {
	        $('#iContent').prop('src', page);
        },
        // Get the element with id="defaultOpen" and click on it

    },
    mounted: function () {
        var self = this;
        axios.get('index_api.php', {
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
                        }
                    });
                }
            })
            .catch(function (error) {
                alert(JSON.stringify(error.response.data.message))
            });

        // --------------------------

        axios.get('index_api.php', {
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
                        }
                    });
                }
            })
            .catch(function (error) {
                alert(JSON.stringify(error.response.data.message))
            });

        // --------------------------
        // Major

        axios.get('index_api.php', {
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
                        }
                    });
                }
            })
            .catch(function (error) {
                alert(JSON.stringify(error.response.data.message))
            });

        // --------------------------
        // info

        axios.get('index_api.php', {
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

        axios.get('index_api.php', {
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
    }
})