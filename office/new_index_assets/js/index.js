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
            { textTH: "เว็บบอร์ด", textEN: 'Webboard', url: "../index/webboard.php?group=1" },
            { textTH: "ทุนการศึกษา", textEN: 'Scholarship', url: "https://office.kmitl.ac.th/osda/kmitl/" },
            { textTH: "เกี่ยวกับสำนัก", textEN: 'About', url: "../office/" },
        ],
        newsGrad: [],
        announceNow: [],
        
        aboutMenu: [
            { textTH: "ประวัติความเป็นมา", textEN: 'History', url: "javascript:void(0);", target: "getiContent('history.php')" },
            { textTH: "โครงสร้าง", textEN: 'Structure', url: "javascript:void(0);", target: "getiContent('history.php')" },
            { textTH: "วิสัยทัศน์", textEN: 'Vision', url: "javascript:void(0);", target: "getiContent('history.php')" },
            { textTH: "นโยบายการบริหาร", textEN: 'Administation Policy', url: "javascript:void(0);", target: "getiContent('history.php')" },
            { textTH: "บุคลากร", textEN: 'Personnel', url: "javascript:void(0);", target: "getiContent('department.php')" },
        ],

        history: [
            { dateId:"D1", dateTH:"ตุลาคม พ.ศ. 2539", dateEN:"October, 1993", 
                textTH: "แบ่งส่วนราชการออกเป็น 5 ฝ่าย ตามประกาศทบวงมหาวิทยาลัย เรื่องการแบ่งส่วนราชการในสถาบันเทคโนโลยีพระจอมเกล้าเจ้าคุณทหารลาดกระบัง ซึ่งประกาศในราชกิจจานุเบกษา เล่มที่ 113 ตอนที่ 80 ง ลงวันที่ 3 ตุลาคม 2539 ดังนี้ สำนักผู้อำนวยการ ฝ่ายรับเข้าศึกษาและทะเบียนประวัติ ฝ่ายทะเบียนการศึกษา ฝ่ายคอมพิวเตอร์เพื่อการประมวลผลและสถิติ ฝ่ายตรวจสอบและรับรองผลการศึกษา", 
                textEN: 'Declared in the Government Gazette volume 113 section 80 on 3 December 1996 issued by the Ministry of University Affairs, the administration of King Mongkut?s Institute of Technology Ladkrabang was divided into 5 divisions: Bureau of Directors, Admission and Academic Records, Academic Registration, Information Technology for Assessment and Statistics, and Academic Transcript Audit and Validation.',
            },
            { dateId:"D2", dateTH:"สิงหาคม พ.ศ. 2539", dateEN:"August, 1993", 
                textTH: "จัดตั้งตามประกาศในราชกิจจานุเบกษา เล่มที่ 113 ตอนที่ 34 ก ลงวันที่ 28 สิงหาคม พ.ศ. 2539", 
                textEN: 'The administration was established on 28 August 1996 as declared in the Government Gazette volume 113 section 34 Kor.',
            },
            { dateId:"D3", dateTH:"พ.ศ. 2548", dateEN:"2005", 
                textTH: "ปรับปรุงระบบงานทะเบียนและประมวลผลการศึกษา โดยสถาบันเทคโนโลยีพระจอมเกล้าเจ้าคุณทหารลาดกระบัง ตามคำสั่งที่ 1746/2548 เรื่องการปรับปรุงระบบงานทะเบียนและประมวลผลการศึกษา โดยให้โอน ภารกิจ อำนาจหน้าที่และความรับผิดชอบของฝ่ายวิชาการและแผนงานในบัณฑิตวิทยาลัย ที่เกี่ยวข้องกับงานทะเบียนในระดับบัณฑิตศึกษามารวมในพันธกิจของสำนักทะเบียนและประมวลผล", 
                textEN: 'By Order Number 1746/2548 issued by King Mongkut\'s Institute of Technology Ladkrabang on the matter of improvement of registration and academic assessment, the duty, responsibility, and authority pertaining to the registration function of the Graduate College was transferred to the Office of Registration and Academic Assessment',
            },
            { dateId:"D4", dateTH:"พ.ศ. 2548", dateEN:"2005", 
                textTH: "ปรับปรุงการจัดแบ่งส่วนในสำนักทะเบียนและประมวลผล โดยจัดแบ่งเป็น 8 ส่วนงาน ตามคำสั่งสถาบันฯ ที่ 1747/2548 ดังนี้ สำนักงานผู้อำนวยการ ฝ่ายตรวจสอบและรับรองผลการศึกษา ฝ่ายทะเบียนการศึกษา ฝ่ายทะเบียนบัณฑิตศึกษา ฝ่ายเทคโนโลยีสารสนเทศ ฝ่ายบริหารการเรียนการสอน ฝ่ายประมวลผลการศึกษา ฝ่ายรับเข้าศึกษาและทะเบียนประวัติ", 
                textEN: 'By Order Number 1747/2548 issued by King Mongkut\'s Institute of Technology Ladkrabang on the matter of division of the Office of Registration and Academic Assessment into various sections responsible for different tasks, the Office was divided into 8 following sections: Office of Director, Transcript Audit and Validation, Undergraduate Registration, Graduate Registration, Information Technology, Educational Administration, Academic Assessment, Admission, and Academic Records.',
            },
            { dateId:"D5", dateTH:"ธันวาคม พ.ศ. 2551", dateEN:"December, 2008", 
                textTH: "ปรับเปลี่ยนโครงสร้างสำนักทะเบียนและประมวลผลใหม่ จึงได้มีการปรับเปลี่ยนและจัดสรรอัตรากำลังในหน่วยงานใหม่ เพื่อให้สอดคล้องตามประกาศสถาบันฯ เรื่องการแบ่งหน่วยงานภายในของสำนักงานสภาสถาบันฯ สำนักงานอธิการบดีและส่วนงานอื่น สถาบันเทคโนโลยีพระจอมเกล้าเจ้าคุณทหารลาดกระบัง พ.ศ. 2551 ลงวันที่ 17 ตุลาคม 2551 ในการประชุมครั้งที่ 13/2551 เมื่อวันที่ 2 ธันวาคม 2551 ดังนี้ งานรับเข้านักศึกษาและทะเบียนประวัติ งานทะเบียนการศึกษา งานบริหารการเรียนการสอน งานประมวลผลการศึกษา งานตรวจสอบและรับรองผลการศึกษา", 
                textEN: 'In compliance to the proclamation of King Mongkut\'s Institute of Technology issued on 17 October 2008 and discussed in the 13/2551 meeting on 2 December 2008 regarding division of the Office of the Institute Council, the Office of the Dean, and other offices and departments into various internal sections, the Office of Registration and Academic Assessment was restructured into 5 following sections: Admission and Academic Records, Academic Registration, Educational Administration, Academic Assessment, and Transcript Audit and Validation.',
            },
            { dateId:"D6", dateTH:"พ.ศ. 2553", dateEN:"2010", 
                textTH: "ปรับโครงสร้างสำนักทะเบียนและประมวลผล เนื่องจากมีการยุบรวมหน่วยงานตามนโยบายการรวมศูนย์และมีการโอนภารกิจด้านทุนการศึกษา (ทุน กยศ. ทุนภายนอก) มายังสำนักทะเบียนและประมวลผล จึงทำให้มีการปรับโครงสร้างใหม่ โดยพฤตินัยทั้งหมด 6 งาน ดังนี้ งานรับเข้านักศึกษาและทะเบียนประวัติ งานทะเบียนการศึกษา งานบริหารการเรียนการสอน งานประมวลผลการศึกษา งานตรวจสอบและรับรองผลการศึกษา งานทุนการศึกษา", 
                textEN: 'Due to the merger of offices and departments according to the policy of integration as well as the scholarship and loan tasks (e.g. external scholarship and student loan) being assigned to the Office of Registration and Academic Assessment, the Office was structured, in practice, into 6 following sections: Admission and Academic Records, Academic Registration, Educational Administration, Academic Assessment, Transcript Audit and Validation, and Scholarship and Loan.',
            },
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
                    document.getElementById('iContent').contentWindow.location.reload();
                })
                .catch(function (error) {
                    alert(JSON.stringify(error.response.data.message))
                });
        },
        t: function (eng, th) {
            return this.language === 'en' ? eng : th;
        },
        openText: function (ev, dateName, elmnt) {
            let i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            let tablink = document.getElementsByClassName("tablink");
            for (i = 0; i < tablink.length; i++) {
                tablink[i].style.backgroundColor = "#ff804b";
            }
            document.getElementById(dateName).style.display = "flex";
            ev.target.style.backgroundColor = "#ff5a32"
    
        }
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