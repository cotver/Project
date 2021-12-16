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
            { textTH: "ระเบียบข้อบังคับของสถาบันฯ", textEN: 'Institute Rules and Regulations', url: "javascript:void(0);", target: "_index.php" },
            { textTH: "ดาวน์โหลดแบบฟอร์ม(ภาษาไทย)", textEN: 'Download Form (Thai)', url: "javascript:void(0);", target: "_index2.php" },
            { textTH: "Download Form (English)", textEN: 'Download Form (English)', url: "javascript:void(0);", target: "_index3.php" },
            { textTH: "เอกสารประกอบการเบิก", textEN: 'Disbursement Documents', url: "javascript:void(0);", target: "_index4.php" },
            { textTH: "ข้อมูลสถิติ จำนวนนักศึกษา", textEN: 'Student Statistics Data', url: "javascript:void(0);", target: "_index5.php" },
            { textTH: "ข้อมูลประกันคุณภาพระดับปริญญาตรี", textEN: 'Quality Assurance Information Undergraduate Level', url: "doc/Data_QA2558-2560_ungrad.rar", target: "_blank" },
            { textTH: "ข้อมูลประกันคุณภาพระดับบัณฑิตศึกษา", textEN: 'Quality Assurance Information Graduate Level', url: "doc/Data_QA2558-2560.rar", target: "_blank" },
            { textTH: "สืบค้นข้อมูลวิชา", textEN: 'Search Subject Information', url: "javascript:void(0);", target: "../public/search_subject_id_free.php" },
            { textTH: "ข้อมูลสาธารณะ (OIT)", textEN: 'Public information (OIT)', url: "OIT.php", target: "_blank" },
        ],
        ruleDoc : [
            {textTH: "ระเบียบข้อบังคับเกี่ยวกับนักศึกษา", textEN: 'ระเบียบข้อบังคับเกี่ยวกับนักศึกษา', Doc: [
                { textTH: "ข้อบังคับสถาบันว่าด้วยการศึกษาระดับปริญญาตรี 2564", textEN: 'ข้อบังคับสถาบันว่าด้วยการศึกษาระดับปริญญาตรี 2564', url: "" },
                { textTH: "ระเบียบว่าด้วยการจัดการศึกษาสองปริญญา ", textEN: 'ระเบียบว่าด้วยการจัดการศึกษาสองปริญญา ', url: "" },
                { textTH: "ระเบียบว่าด้วยการจัดการศึกษาตามโครงการเรียนล่วงหน้า ", textEN: 'ระเบียบว่าด้วยการจัดการศึกษาตามโครงการเรียนล่วงหน้า ', url: "" },
                { textTH: "ประกาศสถาบันฯ เรื่องอัตราค่าธรรมเนียมการศึกษา ", textEN: 'ประกาศสถาบันฯ เรื่องอัตราค่าธรรมเนียมการศึกษา ', url: "" },
                { textTH: "ข้อบังคับ ว่าด้วยการศึกษาระดับบัณฑิตศึกษา พ.ศ. ๒๕๕๑ ", textEN: 'ข้อบังคับ ว่าด้วยการศึกษาระดับบัณฑิตศึกษา พ.ศ. ๒๕๕๑ ', url: "" },
                { textTH: "การผ่อนผันค่าธรรมเนียมการศึกษาระดับบัณฑิตศึกษา ", textEN: 'การผ่อนผันค่าธรรมเนียมการศึกษาระดับบัณฑิตศึกษา ', url: "" },
                { textTH: "ข้อปฏิบัติเกี่ยวกับการเข้าสอบของนักศึกษาระดับปริญญาตรีและระดับบัณฑิตศึกษา ", textEN: 'ข้อปฏิบัติเกี่ยวกับการเข้าสอบของนักศึกษาระดับปริญญาตรีและระดับบัณฑิตศึกษา ', url: "" },
                { textTH: "ข้อบังคับ ว่าด้วยการศึกษาระดับบัณฑิตศึกษา พ.ศ. ๒๕๕๓ ", textEN: 'ข้อบังคับ ว่าด้วยการศึกษาระดับบัณฑิตศึกษา พ.ศ. ๒๕๕๓ ', url: "" },
                { textTH: "ข้อบังคับ ว่าด้วยการศึกษาระดับบัณฑิตศึกษา (ฉบับที่ ๒) พ.ศ. ๒๕๕๓ ", textEN: 'ข้อบังคับ ว่าด้วยการศึกษาระดับบัณฑิตศึกษา (ฉบับที่ ๒) พ.ศ. ๒๕๕๓ ', url: "" },
                { textTH: "ข้อบังคับ ว่าด้วยการศึกษาระดับบัณฑิตศึกษา (ฉบับที่ ๓) พ.ศ. ๒๕๕๔ ", textEN: 'ข้อบังคับ ว่าด้วยการศึกษาระดับบัณฑิตศึกษา (ฉบับที่ ๓) พ.ศ. ๒๕๕๔ ', url: "" },
                { textTH: "การจัดการศึกษาระดับปริญญาตรีแบบก้าวหน้า พ.ศ. ๒๕๕๓ ", textEN: 'การจัดการศึกษาระดับปริญญาตรีแบบก้าวหน้า พ.ศ. ๒๕๕๓ ', url: "" },
                { textTH: "การจัดการศึกษาระดับปริญญาตรีแบบก้าวหน้า (ฉบับที่ ๒) พ.ศ. ๒๕๕๔ ", textEN: 'การจัดการศึกษาระดับปริญญาตรีแบบก้าวหน้า (ฉบับที่ ๒) พ.ศ. ๒๕๕๔ ', url: "" },
                { textTH: "ข้อบังคับสถาบันฯ ว่าด้วยการศึกษาระดับปริญญาตรี พ.ศ. ๒๕๕๔ ", textEN: 'ข้อบังคับสถาบันฯ ว่าด้วยการศึกษาระดับปริญญาตรี พ.ศ. ๒๕๕๔ ', url: "" },
                { textTH: "ประกาศเรื่องการลงทะเบียนเรียนข้ามสถาบันอุดมศึกษา ", textEN: 'ประกาศเรื่องการลงทะเบียนเรียนข้ามสถาบันอุดมศึกษา ', url: "" },
                { textTH: "ข้อบังคับสถาบัน ว่าด้วยการศึกษาระดับปริญญาตรี พ.ศ.๒๕๕๗ ", textEN: 'ข้อบังคับสถาบัน ว่าด้วยการศึกษาระดับปริญญาตรี พ.ศ.๒๕๕๗ ', url: "" },
                { textTH: "ข้อบังคับสถาบัน ว่าด้วยการศึกษาระดับบัณฑิตศึกษา พ.ศ.๒๕๕๗  ", textEN: 'ข้อบังคับสถาบัน ว่าด้วยการศึกษาระดับบัณฑิตศึกษา พ.ศ.๒๕๕๗  ', url: "" },
                { textTH: "ประกาศเรื่องหลักเกณฑ์วิธีการรับผู้เข้าศึกษาเพิ่มเติมเข้าศึกษาในระดับปริญญาตรี ", textEN: 'ประกาศเรื่องหลักเกณฑ์วิธีการรับผู้เข้าศึกษาเพิ่มเติมเข้าศึกษาในระดับปริญญาตรี ', url: "" },
                { textTH: "ข้อบังคับสถาบัน ว่าด้วยการศึกษาระดับบัณฑิตศึกษา พ.ศ.๒๕๕๙ ", textEN: 'ข้อบังคับสถาบัน ว่าด้วยการศึกษาระดับบัณฑิตศึกษา พ.ศ.๒๕๕๙ ', url: "" },
                { textTH: "ข้อบังคับสถาบัน ว่าด้วยการศึกษาระดับบัณฑิตศึกษา (ฉบับที่ ๒) พ.ศ.๒๕๖๐ ", textEN: 'ข้อบังคับสถาบัน ว่าด้วยการศึกษาระดับบัณฑิตศึกษา (ฉบับที่ ๒) พ.ศ.๒๕๖๐ ', url: "" },
                { textTH: "ข้อบังคับสถาบัน ว่าด้วยการศึกษาระดับบัณฑิตศึกษา (ฉบับที่ ๓) พ.ศ.๒๕๖๑ ", textEN: 'ข้อบังคับสถาบัน ว่าด้วยการศึกษาระดับบัณฑิตศึกษา (ฉบับที่ ๓) พ.ศ.๒๕๖๑ ', url: "" },
                { textTH: "ข้อบังคับสถาบัน ว่าด้วยการศึกษาระดับบัณฑิตศึกษา (ฉบับที่ ๔) พ.ศ.๒๕๖๑  ", textEN: 'ข้อบังคับสถาบัน ว่าด้วยการศึกษาระดับบัณฑิตศึกษา (ฉบับที่ ๔) พ.ศ.๒๕๖๑  ', url: "" },
                { textTH: "ข้อบังคับสถาบัน ว่าด้วยการศึกษาระดับปริญญาตรี พ.ศ. ๒๕๕๙  ", textEN: 'ข้อบังคับสถาบัน ว่าด้วยการศึกษาระดับปริญญาตรี พ.ศ. ๒๕๕๙  ', url: "" },
                { textTH: "การศึกษาระดับปริญญาตรีโครงการแววนวัตกร พ.ศ. ๒๕๖๐ ", textEN: 'การศึกษาระดับปริญญาตรีโครงการแววนวัตกร พ.ศ. ๒๕๖๐ ', url: "" },
                { textTH: "ข้อบังคับระดับปริญญาตรี ฉบับที่ ๒ พ.ศ. ๒๕๖๑ ", textEN: 'ข้อบังคับระดับปริญญาตรี ฉบับที่ ๒ พ.ศ. ๒๕๖๑ ', url: "" },
                { textTH: "ข้อบังคับระดับปริญญาตรี ฉบับที่ ๓ พ.ศ. ๒๕๖๓ ", textEN: 'ข้อบังคับระดับปริญญาตรี ฉบับที่ ๓ พ.ศ. ๒๕๖๓ ', url: "" },
                { textTH: "ข้อบังคับสถาบัน ว่าด้วยการศึกษาระดับบัณฑิตศึกษา (ฉบับที่ ๕) พ.ศ.๒๕๖๓  ", textEN: 'ข้อบังคับสถาบัน ว่าด้วยการศึกษาระดับบัณฑิตศึกษา (ฉบับที่ ๕) พ.ศ.๒๕๖๓  ', url: "" },
                { textTH: "ข้อบังคับเครื่องแบบนักศึกษาฉบับ2 ", textEN: 'ข้อบังคับเครื่องแบบนักศึกษาฉบับ2 ', url: "" },
                { textTH: "ข้อบังคับสถาบันว่าด้วยการศึกษาระดับบัณฑิตศึกษา (ฉบับที่6) 2563 ", textEN: 'ข้อบังคับสถาบันว่าด้วยการศึกษาระดับบัณฑิตศึกษา (ฉบับที่6) 2563 ', url: "" },
                { textTH: "ข้อบังคับสถาบันว่าด้วยการศึกษาระดับบัณฑิตศึกษา (ฉบับที่7) 2563 ", textEN: 'ข้อบังคับสถาบันว่าด้วยการศึกษาระดับบัณฑิตศึกษา (ฉบับที่7) 2563 ', url: "" },
                { textTH: "ข้อบังคับสถาบันว่าด้วยการศึกษาระดับปริญญาตรี (ฉบับที่4) 2563 ", textEN: 'ข้อบังคับสถาบันว่าด้วยการศึกษาระดับปริญญาตรี (ฉบับที่4) 2563 ', url: "" },
            ],},
            {textTH: "ระเบียบค่าธรรมเนียมการศึกษา", textEN: 'ระเบียบค่าธรรมเนียมการศึกษา', Doc: [
                { textTH: "", textEN: '', url: "" },
                { textTH: "", textEN: '', url: "" },
                { textTH: "", textEN: '', url: "" },
                { textTH: "", textEN: '', url: "" },
                { textTH: "", textEN: '', url: "" },
                { textTH: "", textEN: '', url: "" },
                { textTH: "", textEN: '', url: "" },
                { textTH: "", textEN: '', url: "" },
                { textTH: "", textEN: '', url: "" },
                { textTH: "", textEN: '', url: "" },
            ],},
            {textTH: "ประกาศสำนักทะเบียนและประมวลผล", textEN: 'ประกาศสำนักทะเบียนและประมวลผล', Doc: [
                { textTH: "การใช้ระบบประเมินการสอนของอาจารย์", textEN: 'การใช้ระบบประเมินการสอนของอาจารย์', url: "" },
                { textTH: "ยกเลิกการติดรูปถ่ายบนเอกสารทางการศึกษา", textEN: 'ยกเลิกการติดรูปถ่ายบนเอกสารทางการศึกษา', url: "" },
            ],},
            {textTH: "ประกาศสถาบันเทคโนโลยีพระจอมเกล้าเจ้าคุณทหารลาดกระบัง", textEN: 'ประกาศสถาบันเทคโนโลยีพระจอมเกล้าเจ้าคุณทหารลาดกระบัง', Doc: [
                { textTH: "ประกาศ เรื่อง การใช้ห้องบรรยายศูนย์เรียนรวม สมเด็จพระเทพรัตนราชสุดาฯ", textEN: 'ประกาศ เรื่อง การใช้ห้องบรรยายศูนย์เรียนรวม สมเด็จพระเทพรัตนราชสุดาฯ', url: "" },
                { textTH: "ประกาศสถาบันฯหลักเกณฑ์การส่งคะแนนและเกรดในการวัดผลการศึกษาระดับปริญญาตรีและบัณฑิตศึกษา", textEN: 'ประกาศสถาบันฯหลักเกณฑ์การส่งคะแนนและเกรดในการวัดผลการศึกษาระดับปริญญาตรีและบัณฑิตศึกษา', url: "" },
                { textTH: "ประกาศเกณฑ์มาตรฐานความรู้ภาษาอังกฤษ ระดับบัณฑิตศึกษา 2560", textEN: 'ประกาศเกณฑ์มาตรฐานความรู้ภาษาอังกฤษ ระดับบัณฑิตศึกษา 2560', url: "" },
                { textTH: "ประกาศเกณฑ์มาตรฐานความรู้ภาษาอังกฤษ ระดับบัณฑิตศึกษา (ฉบับที่ 2)", textEN: 'ประกาศเกณฑ์มาตรฐานความรู้ภาษาอังกฤษ ระดับบัณฑิตศึกษา (ฉบับที่ 2)', url: "" },
                { textTH: "ประกาศสถาบันฯหลักเกณฑ์การส่งคะแนนและเกรดในการวัดผลการศึกษาระดับปริญญาตรีและบัณฑิตศึกษา พ.ศ. 2560", textEN: 'ประกาศสถาบันฯหลักเกณฑ์การส่งคะแนนและเกรดในการวัดผลการศึกษาระดับปริญญาตรีและบัณฑิตศึกษา พ.ศ. 2560', url: "" },
                { textTH: "ข้อบังคับสถาบันว่าด้วยการรับสมัครบุคคลทั่วไปเข้าสึกษาเพื่อเพิ่มพูนความรู้และสะสมหน่วยกิจ(ฉบับที่2)2563", textEN: '', url: "" },
                { textTH: "ประกาศสถาบันฯ เรื่องการจัดการหลักสูตรวิชาโท พ.ศ.2563", textEN: 'ประกาศสถาบันฯ เรื่องการจัดการหลักสูตรวิชาโท พ.ศ.2563', url: "" },
                { textTH: "ประกาศสถาบันฯ เรื่อง การสอบวัดความรู้ทักษะภาษาอังกฤษก่อนจบการศึกษา(English Exit Exam)สำหรับนักศึกษาระดับปริญญา...", textEN: 'ประกาศสถาบันฯ เรื่อง การสอบวัดความรู้ทักษะภาษาอังกฤษก่อนจบการศึกษา(English Exit Exam)สำหรับนักศึกษาระดับปริญญา...', url: "" },
                { textTH: "ประกาศสถาบันฯ เรื่อง การสอบวัดระดับความรู้ภาษาอังกฤษก่อนเข้าศึกษา ระดับปริญญาตรี", textEN: 'ประกาศสถาบันฯ เรื่อง การสอบวัดระดับความรู้ภาษาอังกฤษก่อนเข้าศึกษา ระดับปริญญาตรี', url: "" },
                { textTH: "ประกาศสถาบันฯ เรื่อง การรายงานตัวเข้าเป็นนักศึกษา ระดับปริญญาตรีและระดับบัณฑิตศึกษา", textEN: 'ประกาศสถาบันฯ เรื่อง การรายงานตัวเข้าเป็นนักศึกษา ระดับปริญญาตรีและระดับบัณฑิตศึกษา', url: "" },
            ],},
        ],
        DocTha : [
            {textTH: "ระดับปริญญาตรี | Undergraduate Documents", textEN: 'ระดับปริญญาตรี | Undergraduate Documents', Doc : [
                { textTH: "คำร้องขอเอกสาร (ในกรณียังไม่สำเร็จการศึกษา)", textEN: 'คำร้องขอเอกสาร (ในกรณียังไม่สำเร็จการศึกษา)', url: "", target: "" },
                { textTH: "คำร้องขอเอกสาร (กรณีจบการศึกษารอสภาสถาบันอนุมัติ)", textEN: 'คำร้องขอเอกสาร (กรณีจบการศึกษารอสภาสถาบันอนุมัติ)', url: "", target: "" },
                { textTH: "คำร้องขอเอกสาร (ในกรณีสำเร็จการศึกษา)", textEN: 'คำร้องขอเอกสาร (ในกรณีสำเร็จการศึกษา)', url: "", target: "" },
                { textTH: "คำร้องขอเอกสารใบแปลปริญญาบัตรฉบับภาษาอังกฤษ", textEN: 'คำร้องขอเอกสารใบแปลปริญญาบัตรฉบับภาษาอังกฤษ', url: "", target: "" },
                { textTH: "หนังสือมอบอำนาจ", textEN: 'หนังสือมอบอำนาจ', url: "", target: "" },
                { textTH: "แบบฟอร์มขอใช้ห้อง", textEN: 'แบบฟอร์มขอใช้ห้อง', url: "", target: "" },
                { textTH: "คำร้องขอเปลี่ยนชื่อ-นามสกุล", textEN: 'คำร้องขอเปลี่ยนชื่อ-นามสกุล', url: "", target: "" },
                { textTH: "คำร้องขอลาพักการศึกษา", textEN: 'คำร้องขอลาออก', url: "", target: "" },
                { textTH: "หนังสือรับรองของอาจารย์ที่ปรึกษา", textEN: 'คำร้องรักษาสถานภาพนักศึกษา', url: "", target: "" },
            ],},
            {textTH: "ระดับบัณฑิตศึกษา | Graduate Documents", textEN: 'ระดับบัณฑิตศึกษา | Graduate Documents', Doc: [
                { textTH: "คำร้องขอเอกสาร (ในกรณีสำเร็จการศึกษา)", textEN: 'คำร้องขอเอกสาร (ในกรณีสำเร็จการศึกษา)', url: "", target: "" },
                { textTH: "คำร้องขอเปลี่ยนชื่อ-สกุล, คำนำหน้าชื่อ", textEN: 'คำร้องขอเปลี่ยนชื่อ-สกุล, คำนำหน้าชื่อ', url: "", target: "" },
                { textTH: "คำร้องขอรักษาสภาพนักศึกษา", textEN: 'คำร้องขอรักษาสภาพนักศึกษา', url: "", target: "" },
                { textTH: "คำร้องทั่วไป", textEN: 'คำร้องทั่วไป', url: "", target: "" },
                { textTH: "หนังสือมอบอำนาจ", textEN: 'หนังสือมอบอำนาจ', url: "", target: "" },
                { textTH: "นังสือมอบฉันทะ", textEN: 'นังสือมอบฉันทะ', url: "", target: "" },
                { textTH: "คำร้องขอเอกสาร (กรณียังไม่สำเร็จการศึกษา)", textEN: 'คำร้องขอเอกสาร (กรณียังไม่สำเร็จการศึกษา)', url: "", target: "" },
                { textTH: "แบบฟอร์มการผ่านเกณฑ์ภาษาอังกฤษ ระดับบัณฑิตศึกษา", textEN: 'แบบฟอร์มการผ่านเกณฑ์ภาษาอังกฤษ ระดับบัณฑิตศึกษา', url: "", target: "" },
                { textTH: "คำร้องขอลาออก", textEN: 'คำร้องขอลาออก', url: "", target: "" },
            ],},
        ],
        DocEng : [
            {textTH: "Download Form", textEN: 'Download Form', Doc: [
                { textTH: "Document Request Form", textEN: 'Document Request Form', url: "", target: "" },
                { textTH: "General Request Form", textEN: 'General Request Form', url: "", target: "" },
                { textTH: "Request Form for Resignation", textEN: 'Request Form for Resignation', url: "", target: "" },
                { textTH: "Request Form for Retaining", textEN: 'Request Form for Retaining', url: "", target: "" },
                { textTH: "Request Form for Leave of Absence", textEN: 'Request Form for Leave of Absence', url: "", target: "" },
            ],},
        ],
        Withdrawing : [
            {textTH: "เอกสารประกอบการเบิก", textEN: 'เอกสารประกอบการเบิก', Doc: [
                { textTH: "นักศึกษาที่เข้าศึกษาก่อนปีการศึกษา 2558", textEN: 'นักศึกษาที่เข้าศึกษาก่อนปีการศึกษา 2558', url: "", target: "" },
                { textTH: "นักศึกษาที่เข้าศึกษาตั้งแต่ปีการศึกษา 2558 เป็นต้นไป", textEN: 'นักศึกษาที่เข้าศึกษาตั้งแต่ปีการศึกษา 2558 เป็นต้นไป', url: "", target: "" },
                { textTH: "เอกสารประกอบการเบิก วิทยาลัยนวัตกรรมการจัดการข้อมูล", textEN: 'เอกสารประกอบการเบิก วิทยาลัยนวัตกรรมการจัดการข้อมูล', url: "", target: "" },
                { textTH: "เอกสารประกอบการเบิก อัตราค่าธรรมเนียมการศึกษา พ.ศ. 2559 (สำหรับนักศึกษาที่เข้าศึกษา ปีการศึกษา 2560 )", textEN: 'เอกสารประกอบการเบิก อัตราค่าธรรมเนียมการศึกษา พ.ศ. 2559 (สำหรับนักศึกษาที่เข้าศึกษา ปีการศึกษา 2560 )', url: "", target: "" },
                { textTH: "เอกสารแนบ ประกอบการใช้ลายเซ็นอิเล็กทรอนิกส์ในใบเสร็จรับเงิน", textEN: 'เอกสารแนบ ประกอบการใช้ลายเซ็นอิเล็กทรอนิกส์ในใบเสร็จรับเงิน', url: "", target: "" },
                { textTH: "เอกสารประกอบการเบิก คณะศิลปศาสตร์", textEN: 'เอกสารประกอบการเบิก คณะศิลปศาสตร์', url: "", target: "" },
                { textTH: "เอกสารประกอบการเบิก คณะสถาปัตยกรรมศาสตร์", textEN: 'เอกสารประกอบการเบิก คณะสถาปัตยกรรมศาสตร์', url: "", target: "" },
                { textTH: "เอกสารประกอบการเบิก อัตราค่าธรรมเนียมการศึกษา (สำหรับนักศึกษาที่เข้าศึกษา ปีการศึกษา 2561-2564)", textEN: 'เอกสารประกอบการเบิก อัตราค่าธรรมเนียมการศึกษา (สำหรับนักศึกษาที่เข้าศึกษา ปีการศึกษา 2561-2564)', url: "", target: "" },
            ],},
        ],
        OIT14: [
            {textTH: "คู่มือมาตรฐานการให้บริการ", textEN: 'คู่มือมาตรฐานการให้บริการ', Doc: [
                { textTH: "Service Level Agreement : SLA - ข้อตกลงระดับการให้บริการ", textEN: 'Service Level Agreement : SLA - ข้อตกลงระดับการให้บริการ', url: "/SLA/",},
                { textTH: "คู่มือนักศึกษา", textEN: 'คู่มือนักศึกษา', url: "/ebook/",},
            ],},
        ],
        OIT15: [
            {textTH: " ข้อมูลสถิติการให้บริการ", textEN: ' ข้อมูลสถิติการให้บริการ', Doc: [
                { textTH: "สถิติจำนวนผู้ใช้บริการขอเอกสารทางการศึกษา", textEN: 'สถิติจำนวนผู้ใช้บริการขอเอกสารทางการศึกษา', url: "",},
                { textTH: "สถิติการขอรับเอกสารทางศึกษา และใบปริญญาบัตรออนไลน์", textEN: 'สถิติการขอรับเอกสารทางศึกษา และใบปริญญาบัตรออนไลน์', url: "",},
                { textTH: "จำนวนผู้ขอทำบัตรประจำตัวนักศึกษา ระดับปริญญาตรี และระดับบัณฑิตศึกษา (กรณีบัตรสูญหาย)", textEN: 'จำนวนผู้ขอทำบัตรประจำตัวนักศึกษา ระดับปริญญาตรี และระดับบัณฑิตศึกษา (กรณีบัตรสูญหาย)', url: "",},
                { textTH: "จำนวนผู้สมัครเข้าศึกษาต่อในหลักสูตรของ สจล.TCAS63 ประจำปีการศึกษา 2563", textEN: 'จำนวนผู้สมัครเข้าศึกษาต่อในหลักสูตรของ สจล.TCAS63 ประจำปีการศึกษา 2563', url: "",},
                { textTH: "สถิติการเข้าใช้งานระบบสารสนเทศสำนักทะเบียนและประมวลผล", textEN: 'สถิติการเข้าใช้งานระบบสารสนเทศสำนักทะเบียนและประมวลผล', url: "",},
            ],},
        ],
        OIT16: [
            {textTH: " รายงานผลการสำรวจความพึงพอใจการให้บริการ 	", textEN: 'คู่มือมาตรฐานการให้บริการ', Doc: [
                { textTH: "ความพึงพอใจต่อการรับบริการสำนักทะเบียนและประมวลผล 2564", textEN: 'ความพึงพอใจต่อการรับบริการสำนักทะเบียนและประมวลผล 2564', url: "",},
                { textTH: "ความพึงพอใจต่อการรับบริการสำนักทะเบียนและประมวลผล 2563", textEN: 'ความพึงพอใจต่อการรับบริการสำนักทะเบียนและประมวลผล 2563', url: "",},
                { textTH: "ความพึงพอใจที่มีต่อระบบรับรายงานตัวออนไลน์ ระดับปริญญาตรี และระดับบัณฑิตศึกษา ปีการศึกษา 2563", textEN: 'ความพึงพอใจที่มีต่อระบบรับรายงานตัวออนไลน์ ระดับปริญญาตรี และระดับบัณฑิตศึกษา ปีการศึกษา 2563', url: "",},
            ],},
        ],
        OIT17: [
            {textTH: "E-Service", textEN: 'E-Service', Doc: [
                { textTH: "ระบบตารางเรียน/ตารางสอบ", textEN: 'ระบบตารางเรียน/ตารางสอบ', url: "",},
                { textTH: "ระบบสืบค้นข้อมูลผู้สำเร็จการศึกษา", textEN: 'ระบบสืบค้นข้อมูลผู้สำเร็จการศึกษา', url: "",},
                { textTH: "ระบบการรับสมัครนักศึกษา ระดับปริญญาตรี", textEN: 'ระบบการรับสมัครนักศึกษา ระดับปริญญาตรี', url: "",},
                { textTH: "ระบบรับสมัครนักศึกษา ระดับบัณฑิตศึกษา", textEN: 'ระบบรับสมัครนักศึกษา ระดับบัณฑิตศึกษา', url: "",},
                { textTH: "ระบบยืนยันสิทธิ์ระดับปริญญาตรี", textEN: 'ระบบยืนยันสิทธิ์ระดับปริญญาตรี', url: "",},
                { textTH: "ระบบขึ้นทะเบียนบัณฑิต", textEN: 'ระบบขึ้นทะเบียนบัณฑิต', url: "",},
            ],},
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
        },
        getiContent:function (ev,page)
        {
	        $('#iContent').prop('src', page);
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