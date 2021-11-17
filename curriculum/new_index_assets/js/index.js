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
        
        CurriculumMenu: [
            { textTH: "หลักสูตรของสถาบันฯ", textEN: 'Institute Curriculum', url: "javascript:void(0);", target: "getiContent('_index.php')" },
            { textTH: "การรับบุคคลเพื่อเข้าศึกษาต่อ", textEN: 'Candidate Admission', url: "../KMITL/", target: "_blank" },
        ],
        Undergraduate: [
            { textTH: "วิศวกรรมศาสตร์", textEN: 'Engineering', url: "faculty01b.php"},
            { textTH: "สถาปัตยกรรม ศิลปะและการออกแบบ (สถาปัตยกรรมศาสตร์)", textEN: 'Architecture', url: "faculty02b.php"},
            { textTH: "ครุศาสตร์อุตสาหกรรมและเทคโนโลยี", textEN: 'Industrial Education and Technology', url: "faculty03b.php"},
            { textTH: "เทคโนโลยีการเกษตร", textEN: 'Agricultural Technology', url: "faculty04b.php"},
            { textTH: "วิทยาศาสตร์", textEN: 'Science', url: "faculty05b.php"},
            { textTH: "อุตสาหกรรมอาหาร (อุตสาหกรรมเกษตร)", textEN: 'Food Industry', url: "faculty06b.php"},
            { textTH: "เทคโนโลยีสารสนเทศ", textEN: 'Information Technology', url: "faculty07b.php"},
            { textTH: "วิทยาลัยนานาชาติ", textEN: ' International College', url: "faculty09b.php"},
            { textTH: "วิทยาลัยเทคโนโลยีและนวัตกรรมวัสดุ (วิทยาลัยนาโนเทคโนโลยีพระจอมเกล้าลาดกระบัง)", textEN: 'College of Nanotechnology', url: "faculty10b.php"},
            { textTH: "วิทยาลัยนวัตกรรมการผลิตขั้นสูง", textEN: 'College of Advanced Manufacturing Innovation', url: "faculty11b.php"},
            { textTH: "บริหารธุรกิจ (การบริหารและจัดการ)", textEN: 'KMITL Business School', url: "faculty12b.php"},
            { textTH: "วิทยาลัยอุตสาหกรรมการบินนานาชาติ", textEN: 'International Academy of Aviation Industry', url: "faculty14b.php"},
            { textTH: "ศิลปศาสตร์", textEN: 'Liberal Arts', url: "faculty15b.php"},
            { textTH: "แพทยศาสตร์", textEN: 'Medicine', url: "faculty16b.php"},
            { textTH: "วิทยาลัยวิศวกรรมสังคีต", textEN: 'Institute of Music Science and Engineering', url: "faculty18b.php"},
            { textTH: "วิทยาเขตชุมพรเขตรอุดมศักดิ์", textEN: 'Prince of Chumphon', url: "faculty20b.php"},
            { textTH: "ทันตแพทยศาสตร์", textEN: 'Dentistry', url: "faculty19b.php"},
            { textTH: "สำนักศึกษาทั่วไป", textEN: 'General Education', url: "faculty90b.php"},
        ],
        Graduate: [
            { textTH: "วิศวกรรมศาสตร์", textEN: 'Engineering', url: "faculty01g.php"},
            { textTH: "สถาปัตยกรรม ศิลปะและการออกแบบ", textEN: 'Architecture', url: "faculty02g.php"},
            { textTH: "ครุศาสตร์อุตสาหกรรมและเทคโนโลยี", textEN: 'Industrial Education and Technology', url: "faculty03g.php"},
            { textTH: "เทคโนโลยีการเกษตร", textEN: 'Agricultural Technology', url: "faculty04g.php"},
            { textTH: "วิทยาศาสตร์", textEN: 'Science', url: "faculty05g.php"},
            { textTH: "อุตสาหกรรมอาหาร", textEN: 'Food Industry', url: "faculty06g.php"},
            { textTH: "เทคโนโลยีสารสนเทศ", textEN: 'Information Technology', url: "faculty07g.php"},
            { textTH: "วิทยาลัยนานาชาติ", textEN: 'International College', url: "faculty09g.php"},
            { textTH: "วิทยาลัยเทคโนโลยีและนวัตกรรมวัสดุ", textEN: 'College of Nanotechnology', url: "faculty010g.php"},
            { textTH: "วิทยาลัยนวัตกรรมการผลิตขั้นสูง", textEN: 'College of Advanced Manufacturing Innovation', url: "faculty11g.php"},
            { textTH: "บริหารธุรกิจ", textEN: 'KMITL Business School', url: "faculty12g.php"},
            { textTH: "ศิลปศาสตร์", textEN: 'Arts', url: "faculty15g.php"},
            { textTH: "วิทยาลัยวิจัยนวัตกรรมทางการศึกษา", textEN: 'College of Educational Innovation Research', url: "faculty17g.php"},
            { textTH: "วิทยาลัยวิศวกรรมสังคีต ", textEN: 'Institute of Music Science and Engineering', url: "faculty18g.php"},
            { textTH: "วิทยาเขตชุมพรเขตรอุดมศักดิ์", textEN: 'Prince of Chumphon', url: "faculty20g.php"},
        ],
        Minor: [
            { textTH: "วิศวกรรมศาสตร์", textEN: 'Engineering', url: "faculty01Minor"},
            { textTH: "สถาปัตยกรรม ศิลปะและการออกแบบ", textEN: 'Architecture', url: "faculty02Minor"},
            { textTH: "วิทยาศาสตร์", textEN: 'Science', url: "faculty05Minor"},
            { textTH: "อุตสาหกรรมอาหาร", textEN: 'Food Industry', url: "faculty06Minor"},
            { textTH: "เทคโนโลยีสารสนเทศ", textEN: 'Information Technology', url: "faculty07Minor"},
            { textTH: "บริหารธุรกิจ", textEN: 'KMITL Business School', url: "faculty12Minor"},
            { textTH: "ศิลปศาสตร์", textEN: 'Liberal Arts', url: "faculty15Minor"},
        ]

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
        }
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