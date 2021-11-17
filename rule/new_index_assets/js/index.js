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
        
        DocumentsMenu: [
            { textTH: "ระเบียบข้อบังคับของสถาบันฯ", textEN: 'nstitute Rules and Regulations', url: "javascript:void(0);", target: "getiContent('_index.php')" },
            { textTH: "ดาวน์โหลดแบบฟอร์ม(ภาษาไทย)", textEN: 'Download Form (Thai)', url: "javascript:void(0);", target: "getiContent('_index2.php')" },
            { textTH: "Download Form (English)", textEN: 'Download Form (English)', url: "javascript:void(0);", target: "getiContent('_index3.php')" },
            { textTH: "เอกสารประกอบการเบิก", textEN: 'Disbursement Documents', url: "javascript:void(0);", target: "getiContent('_index4.php')" },
            { textTH: "ข้อมูลสถิติ จำนวนนักศึกษา", textEN: 'Student Statistics Data', url: "javascript:void(0);", target: "getiContent('_index5.php')" },
            { textTH: "ข้อมูลประกันคุณภาพระดับปริญญาตรี", textEN: 'Quality Assurance Information Undergraduate Level', url: "doc/Data_QA2558-2560_ungrad.rar", target: "getiContent('_blank')" },
            { textTH: "ข้อมูลประกันคุณภาพระดับบัณฑิตศึกษา", textEN: 'Quality Assurance Information Graduate Level', url: "doc/Data_QA2558-2560.rar", target: "getiContent('_blank')" },
            { textTH: "สืบค้นข้อมูลวิชา", textEN: 'Search Subject Information', url: "javascript:void(0);", target: "getiContent('../public/search_subject_id_free.php')" },
            { textTH: "ข้อมูลสาธารณะ (OIT)", textEN: 'Public information (OIT)', url: "OIT.php", target: "getiContent('_blank')" },
        ],
        UndergraduateDocTha : [
            { textTH: "คำร้องขอเอกสาร (ในกรณียังไม่สำเร็จการศึกษา)", textEN: 'คำร้องขอเอกสาร (ในกรณียังไม่สำเร็จการศึกษา)', url: "", target: "" },
            { textTH: "คำร้องขอเอกสาร (กรณีจบการศึกษารอสภาสถาบันอนุมัติ)", textEN: 'คำร้องขอเอกสาร (กรณีจบการศึกษารอสภาสถาบันอนุมัติ)', url: "", target: "" },
            { textTH: "คำร้องขอเอกสาร (ในกรณีสำเร็จการศึกษา)", textEN: 'คำร้องขอเอกสาร (ในกรณีสำเร็จการศึกษา)', url: "", target: "" },
            { textTH: "คำร้องขอเอกสารใบแปลปริญญาบัตรฉบับภาษาอังกฤษ", textEN: 'คำร้องขอเอกสารใบแปลปริญญาบัตรฉบับภาษาอังกฤษ', url: "", target: "" },
            { textTH: "หนังสือมอบอำนาจ", textEN: 'หนังสือมอบอำนาจ', url: "", target: "" },
            { textTH: "แบบฟอร์มขอใช้ห้อง", textEN: 'แบบฟอร์มขอใช้ห้อง', url: "", target: "" },
            { textTH: "คำร้องขอเปลี่ยนชื่อ-นามสกุล", textEN: 'คำร้องขอเปลี่ยนชื่อ-นามสกุล', url: "", target: "" },
            { textTH: "คำร้องขอลาพักการศึกษา", textEN: 'คำร้องขอลาออก', url: "", target: "" },
            { textTH: "หนังสือรับรองของอาจารย์ที่ปรึกษา", textEN: 'คำร้องรักษาสถานภาพนักศึกษา', url: "", target: "" },
        ],
        GraduateDocTha: [
            { textTH: "คำร้องขอเอกสาร (ในกรณีสำเร็จการศึกษา)", textEN: 'คำร้องขอเอกสาร (ในกรณีสำเร็จการศึกษา)', url: "", target: "" },
            { textTH: "คำร้องขอเปลี่ยนชื่อ-สกุล, คำนำหน้าชื่อ", textEN: 'คำร้องขอเปลี่ยนชื่อ-สกุล, คำนำหน้าชื่อ', url: "", target: "" },
            { textTH: "คำร้องขอรักษาสภาพนักศึกษา", textEN: 'คำร้องขอรักษาสภาพนักศึกษา', url: "", target: "" },
            { textTH: "คำร้องทั่วไป", textEN: 'คำร้องทั่วไป', url: "", target: "" },
            { textTH: "หนังสือมอบอำนาจ", textEN: 'หนังสือมอบอำนาจ', url: "", target: "" },
            { textTH: "นังสือมอบฉันทะ", textEN: 'นังสือมอบฉันทะ', url: "", target: "" },
            { textTH: "คำร้องขอเอกสาร (กรณียังไม่สำเร็จการศึกษา)", textEN: 'คำร้องขอเอกสาร (กรณียังไม่สำเร็จการศึกษา)', url: "", target: "" },
            { textTH: "แบบฟอร์มการผ่านเกณฑ์ภาษาอังกฤษ ระดับบัณฑิตศึกษา", textEN: 'แบบฟอร์มการผ่านเกณฑ์ภาษาอังกฤษ ระดับบัณฑิตศึกษา', url: "", target: "" },
            { textTH: "คำร้องขอลาออก", textEN: 'คำร้องขอลาออก', url: "", target: "" },
        ],
        UnderAPostgraduateDocEng: [
            { textTH: "Document Request Form", textEN: 'Document Request Form', url: "", target: "" },
            { textTH: "General Request Form", textEN: 'General Request Form', url: "", target: "" },
            { textTH: "Request Form for Resignation", textEN: 'Request Form for Resignation', url: "", target: "" },
            { textTH: "Request Form for Retaining", textEN: 'Request Form for Retaining', url: "", target: "" },
            { textTH: "Request Form for Leave of Absence", textEN: 'Request Form for Leave of Absence', url: "", target: "" },
        ],
        Withdrawing: [
            { textTH: "นักศึกษาที่เข้าศึกษาก่อนปีการศึกษา 2558", textEN: 'นักศึกษาที่เข้าศึกษาก่อนปีการศึกษา 2558', url: "", target: "" },
            { textTH: "นักศึกษาที่เข้าศึกษาตั้งแต่ปีการศึกษา 2558 เป็นต้นไป", textEN: 'นักศึกษาที่เข้าศึกษาตั้งแต่ปีการศึกษา 2558 เป็นต้นไป', url: "", target: "" },
            { textTH: "เอกสารประกอบการเบิก วิทยาลัยนวัตกรรมการจัดการข้อมูล", textEN: 'เอกสารประกอบการเบิก วิทยาลัยนวัตกรรมการจัดการข้อมูล', url: "", target: "" },
            { textTH: "เอกสารประกอบการเบิก อัตราค่าธรรมเนียมการศึกษา พ.ศ. 2559 (สำหรับนักศึกษาที่เข้าศึกษา ปีการศึกษา 2560 )", textEN: 'เอกสารประกอบการเบิก อัตราค่าธรรมเนียมการศึกษา พ.ศ. 2559 (สำหรับนักศึกษาที่เข้าศึกษา ปีการศึกษา 2560 )', url: "", target: "" },
            { textTH: "เอกสารแนบ ประกอบการใช้ลายเซ็นอิเล็กทรอนิกส์ในใบเสร็จรับเงิน", textEN: 'เอกสารแนบ ประกอบการใช้ลายเซ็นอิเล็กทรอนิกส์ในใบเสร็จรับเงิน', url: "", target: "" },
            { textTH: "เอกสารประกอบการเบิก คณะศิลปศาสตร์", textEN: 'เอกสารประกอบการเบิก คณะศิลปศาสตร์', url: "", target: "" },
            { textTH: "เอกสารประกอบการเบิก คณะสถาปัตยกรรมศาสตร์", textEN: 'เอกสารประกอบการเบิก คณะสถาปัตยกรรมศาสตร์', url: "", target: "" },
            { textTH: "เอกสารประกอบการเบิก อัตราค่าธรรมเนียมการศึกษา (สำหรับนักศึกษาที่เข้าศึกษา ปีการศึกษา 2561-2564)", textEN: 'เอกสารประกอบการเบิก อัตราค่าธรรมเนียมการศึกษา (สำหรับนักศึกษาที่เข้าศึกษา ปีการศึกษา 2561-2564)', url: "", target: "" },
        ],
        aaa: [
            { textTH: "", textEN: '', url: "", target: "" },
            { textTH: "", textEN: '', url: "", target: "" },
            { textTH: "", textEN: '', url: "", target: "" },
            { textTH: "", textEN: '', url: "", target: "" },
            { textTH: "", textEN: '', url: "", target: "" },
            { textTH: "", textEN: '', url: "", target: "" },
            { textTH: "", textEN: '', url: "", target: "" },
            { textTH: "", textEN: '', url: "", target: "" },
            { textTH: "", textEN: '', url: "", target: "" },
            { textTH: "", textEN: '', url: "", target: "" },
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