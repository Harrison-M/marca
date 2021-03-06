<?php

namespace Marca\DocBundle\DataFixtures\ORM\AdditionalFixtures;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAware;
use Marca\DocBundle\Entity\Markupset;
use Marca\DocBundle\Entity\Markup;
use Doctrine\ORM\EntityManager;

/**
 * Description of LoadMarkupsetData
 * To load this fixture  only path, not filename
 * app/console doctrine:fixtures:load --fixtures="pathtofile" --append
 *
 * @author Ron
 */
class LoadMarkupsetData implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {

$id =1;
$user = $manager->getRepository('MarcaUserBundle:User')->findOneById($id);

$markupset1 = $this->createMarkupSet('Presentation and Design', 1, $user);

$markup1 = $this->createMarkup('Agr PA', $user, 'darkseagreen', 'agr_pa', $markupset1, 'http://www.cws.illinois.edu/workshop/writers/pronounagreement/', 'A plural noun must be replaced by a plural pronoun, a singular noun by a singular pronoun.');

$markup2 = $this->createMarkup('Agr SV', $user, 'darkseagreen', 'agr_sv', $markupset1, 'http://owl.english.purdue.edu/owl/resource/599/01/', 'Generally, in formal English prose, subjects and verbs must agree in number and person.');

$markup3 = $this->createMarkup('Apostrophe usage', $user, 'darkseagreen', 'apostrophe_usage', $markupset1, 'http://www.writingcommons.org/stylecc/punctuation/529-review-apostrophe-usage-', 'In general, use an apostrophe to form possessives and contractions, not plurals.');

$markup4 = $this->createMarkup('Capitalization', $user, 'darkseagreen', 'capitalization', $markupset1, 'http://owl.english.purdue.edu/owl/resource/592/1/', 'Use capital letters generally to indicate the first word of a sentence and proper nouns.');

$markup5 = $this->createMarkup('Comma coordinating', $user, 'darkseagreen', 'comma_coordinating', $markupset1, 'http://owl.english.purdue.edu/owl/resource/598/01/', 'Use a comma before the coordinating conjunction (and, but, or, nor, for, so, yet) in a compound sentence.');

$markup6 = $this->createMarkup('Comma introductory', $user, 'darkseagreen', 'comma_introductory', $markupset1, 'http://owl.english.purdue.edu/owl/resource/607/03/', 'Use commas to set off introductory clauses, phrases, and words that begin a sentence.');

$markup7 = $this->createMarkup('Comma non-restrictive', $user, 'darkseagreen', 'comma_non_restrictive', $markupset1, 'http://owl.english.purdue.edu/owl/resource/607/05/', 'Clauses, words, and phrases that elaborate but do not change the essential meaning of the sentence should be set off by commas.');

$markup8 = $this->createMarkup('Comma series', $user, 'darkseagreen', 'comma_series', $markupset1, 'http://owl.english.purdue.edu/owl/resource/607/01/', 'Use commas to separate nouns in a series.');

$markup9 = $this->createMarkup('Comma splice', $user, 'darkseagreen', 'comma_splice', $markupset1, 'http://www.cws.illinois.edu/workshop/writers/fusedsentences/', 'Dont use a comma to separate two independent clauses without a coordinating conjunction.'); 

$markup10 = $this->createMarkup('Dangling modifier', $user, 'darkseagreen', 'dangling_modifier', $markupset1, 'http://www.cws.illinois.edu/workshop/writers/danglingmodifiers/', 'A dangling modifier is misplaced in the sentence.');

$markup11 = $this->createMarkup('Sentence fragment', $user, 'darkseagreen', 'sentence_fragment', $markupset1, 'http://www.cws.illinois.edu/workshop/writers/sentencefragments/', 'To be complete, a sentence must have both a subject and a predicate.');

$markup12 = $this->createMarkup('Fused sentence', $user, 'darkseagreen', 'fused_sentence', $markupset1, 'http://www.cws.illinois.edu/workshop/writers/fusedsentences/', 'Make this into two sentences or into a compound sentence where two independent clauses are joined by a comma and coordinating conjunction, or a semicolon.');

$markup13 = $this->createMarkup('Needs hyphen', $user, 'darkseagreen', 'needs_hyphen', $markupset1, 'http://www.writingcommons.org/stylecc/punctuation/531-review-hyphen-usage-', 'You need a hyphen here.');

$markup14 = $this->createMarkup('Missing word', $user, 'darkseagreen', 'missing_word', $markupset1, 'http://www.writingcommons.org/process/edit/812-proofreading', 'A word is needed here for this to make sense. Always make sure to proofread carefully');

$markup15 = $this->createMarkup('Proofreading', $user, 'darkseagreen', 'proofreading', $markupset1, 'http://www.writingcommons.org/process/edit/812-proofreading', 'This section contains a number of issues that could have been avoided with careful proofreading.');

$markup16 = $this->createMarkup('Unclear pronoun reference', $user, 'darkseagreen', 'unclear_pronoun_reference', $markupset1, 'http://www.cws.illinois.edu/workshop/writers/pronouns/', 'It is hard to tell which preceding noun this pronoun is replacing.');

$markup17 = $this->createMarkup('Abbreviation ineffective', $user, 'darkseagreen', 'abbreviation_ineffective', $markupset1, 'http://www.writingcommons.org/genres/academic-writing/use-academic-language', 'In general, avoid abbreviations like this one in formal academic prose.');

$markup18 = $this->createMarkup('Spelling error', $user, 'darkseagreen', 'spelling', $markupset1, 'http://www.writingcommons.org/process/edit/812-proofreading', "Always proofread carefully, even when you're using a spell-checker tool.");

$markup19 = $this->createMarkup('Tense shift', $user, 'darkseagreen', 'tense_shift', $markupset1, 'http://owl.english.purdue.edu/owl/resource/601/04/', 'Avoid shifting tenses in academic prose except where necessary, for example, to indicate the timing of a sequence of events.');

$markup20 = $this->createMarkup('Wrong word', $user, 'darkseagreen', 'wrong_word', $markupset1, 'http://owl.english.purdue.edu/engagement/index.php?category_id=2&sub_category_id=2&article_id=66', "This word seems out of place or doesn't really make sense here as used. Check the definition to get a better understanding of its meaning and connotations.");

$markup21 = $this->createMarkup('Comma unnecessary', $user, 'darkseagreen', 'comma_unnec', $markupset1, 'http://owl.english.purdue.edu/owl/resource/607/01/', "This comma isn't needed here.");

$markup22 = $this->createMarkup('Hyphen unnecessary', $user, 'darkseagreen', 'hyphen_unnecessary', $markupset1, 'http://www.writingcommons.org/stylecc/punctuation/531-review-hyphen-usage-', "You don't need a hyphen here.");

$markup23 = $this->createMarkup('Dash', $user, 'darkseagreen', 'dash', $markupset1, 'http://owl.english.purdue.edu/engagement/index.php?category_id=3&sub_category_id=7&article_id=98', 'Use of a dash here would add clarity or emphasis.');

$markup24 = $this->createMarkup('Documentation mechanics', $user, 'darkseagreen', 'documentation_mechanics', $markupset1, 'http://ebooks.bfwpub.com/smhandbook7e.php', 'Good documentation of your sources, but check the appropriate style guide to see how this citation should be formatted and punctuated.');

$markup25 = $this->createMarkup('Ellipses', $user, 'darkseagreen', 'ellipses', $markupset1, 'http://www.cws.illinois.edu/workshop/writers/tips/quotations/#punctuatingwodoc','You need an ellipses here to indicate omitted content or a pause for emphasis.');

$markup26 = $this->createMarkup('Italics', $user, 'darkseagreen', 'italics', $markupset1, 'http://owl.english.purdue.edu/engagement/index.php?category_id=2&sub_category_id=1&article_id=45', 'Use italics for long works and titles of things such as anthologies and series.');

$markup27 = $this->createMarkup('Misplaced modifier', $user, 'darkseagreen', 'misplace_mod', $markupset1, 'http://www.writingcommons.org/stylecc/word-order', 'Words, phrases, and clauses cause ambiguity or confusion when they are not placed correctly within a sentence.');

$markup29 = $this->createMarkup('Numbers', $user, 'darkseagreen', 'numbers', $markupset1, 'http://owl.english.purdue.edu/owl/resource/593/01/', 'Generally, spell out numbers requiring only one or two words, and use the numbers themselves if they require three or more, for example "one hundred" but "101."');

$markup30 = $this->createMarkup('Parallelism', $user, 'darkseagreen', 'par_structure', $markupset1, 'http://www.cws.illinois.edu/workshop/writers/tips/parallelism/', 'Items in a list or series should be parallel in structure, meaning they should be the same parts of speech (e.g., "apple, orange, pear" not "apple, eat, shiny") or equivalent constructions (e.g. "going for a walk, riding a bike, taking a train" not "going for a walk, to ride a bike, on the train."');

$markup31 = $this->createMarkup('Punctuation error', $user, 'darkseagreen', 'punctuation', $markupset1, 'http://owl.english.purdue.edu/owl/section/1/6/', 'This is punctuated incorrectly.');

$markup32 = $this->createMarkup('Quotation marks', $user, 'darkseagreen', 'quote_marks', $markupset1, 'http://www.cws.illinois.edu/workshop/writers/tips/quotations/#punctuatingwodoc', 'Use double quotation marks to signal a direct quotation in American English, and review the guidelines on how to punctuate direct quotations.');

$markup33 = $this->createMarkup('Source acknowledgment incomplete', $user, 'darkseagreen', 'source_acknowledgment_incomplete', $markupset1, 'http://owl.english.purdue.edu/owl/resource/589/03/', 'When documenting the sources of ideas or quotations, make sure you acknowledge both the author(s) and source(s) of the ideas or quotations.');

$markup34 = $this->createMarkup('Source acknowledgment missing', $user, 'darkseagreen', 'source_missing', $markupset1, 'http://owl.english.purdue.edu/owl/resource/589/02/', 'You need to acknowledge the source of this idea or quote.');

$markupset2 = $this->createMarkupSet('Coherence', 1, $user);

$markup35= $this->createMarkup('Confusing sentence', $user, 'cadetblue', 'confusing_sentence', $markupset2, 'http://owl.english.purdue.edu/owl/resource/635/1/', 'The point of this sentence is unclear. What is the subject of the sentence? What do you want to say about that subject?');

$markup36= $this->createMarkup('Dropped quote', $user, 'cadetblue', 'dropped_quote', $markupset2, 'http://writingcommons.org/evidence/quotations/563-avoid-dropped-quotations-', 'It is good to use direct quotations as evidence, but to be effective the quotation should be introduced with information about its source and followed by a discussion of its relevance to the claim it is offered to support.');

$markup37= $this->createMarkup('Transition needed', $user, 'cadetblue', 'transition_needed', $markupset2, 'http://www.cws.illinois.edu/workshop/writers/tips/transitions/', 'This paragraph needs a transition in the first sentence to show how it connects to or follows from the ideas in the previous paragraph.');

$markup38= $this->createMarkup('Needs parallel structure', $user, 'cadetblue', 'needs_parallel_structure', $markupset2, 'http://www.cws.illinois.edu/workshop/writers/tips/parallelism/', 'Items in a list or series should be parallel in structure, meaning they should be the same parts of speech (e.g., "apple, orange, pear" not "apple, eat, shiny") or equivalent constructions (e.g. "going for a walk, riding a bike, taking a train" not "going for a walk, to ride a bike, on the train."');

$markup39= $this->createMarkup('Dropped quotation', $user, 'cadetblue', 'dropped_quotation', $markupset2, 'http://writingcommons.org/evidence/quotations/563-avoid-dropped-quotations-', 'It is good to use direct quotations as evidence, but to be effective the quotation should be introduced with information about its source and followed by a discussion of its relevance to the claim it is offered to support.');

$markup40= $this->createMarkup('Repetition ineffective', $user, 'cadetblue', 'repetition_ineffective', $markupset2, 'http://owl.english.purdue.edu/owl/resource/573/01/', 'Avoid repetitive words, phrases, and sentence structures unless using them for a reason, such as emphasis or to create unity in document design.');

$markup41= $this->createMarkup('Syntax ineffective', $user, 'cadetblue', 'syntax_ineffective', $markupset2, 'http://owl.english.purdue.edu/owl/resource/635/1/', 'Sentences should be clear and concise, and the arrangement of words in a sentence should make as clear as possible how they relate together to convey meaning.');

$markupset3 = $this->createMarkupSet('Evidence', 1, $user);

$markup42 = $this->createMarkup('Ineffective example or detail', $user, 'chartreuse', 'ineffective_example_or_detail', $markupset3, 'http://owl.english.purdue.edu/owl/resource/724/02/', 'Explain how the evidence you offer here connects to the topic of this paragraph and your thesis.');

$markup43 = $this->createMarkup('Needs more support', $user, 'chartreuse', 'needs_more_support', $markupset3, 'http://writingcommons.org/evidence', 'To be convincing, this claim must be supported by additional evidence.');

$markup44 = $this->createMarkup('Support not relevant to claim', $user, 'chartreuse', 'support_not_relevant_to_claim', $markupset3, 'http://writingcommons.org/evidence/supporting-details/566-check-relevance-of-supporting-details-', 'The passage does not make clear how this evidence supports the claim or thesis.');

$markup45 = $this->createMarkup('Unsupported claim or opinion', $user, 'chartreuse', 'unsupported_claim_or_opinion', $markupset3, 'http://writingcommons.org/evidence/supporting-sources/645-provide-additional-support-for-this-point', 'Avoid making claims unsupported by evidence or offering opinions that lack evidentiary suppport.');

$markupset4 = $this->createMarkupSet('Unity', 1, $user);

$markup46 = $this->createMarkup('Missing Thesis', $user, 'darkorange', 'missing_thesis', $markupset4, 'http://owl.english.purdue.edu/owl/resource/588/01/', 'The thesis is the main point around which the composition should be organized. A good thesis has both a topic and a comment about the topic.');

$markup47 = $this->createMarkup('Missing Topic Sentence', $user, 'darkorange', 'missing_topic_sentence', $markupset4, 'http://writingcommons.org/organization/paragraph-organization/693-where-is-your-topic-sentence', 'Each paragraph should be organized around a single main point or topic, and that topic should be clearly stated in the first sentence of the paragraph.');

$markup48 = $this->createMarkup('Sentence not related to topic', $user, 'darkorange', 'sentence_not_related_to_topic', $markupset4, 'http://writingcommons.org/organization/paragraph-organization/693-where-is-your-topic-sentence', 'How is this sentence related to the topic of this paragraph? All sentences in a paragraph should be clearly related to the topic of the paragraph.');

$markup49 = $this->createMarkup('Thesis lacks comment', $user, 'darkorange', 'thesis_lacks_comment', $markupset4, 'http://www.cws.illinois.edu/workshop/writers/tips/thesis/', 'A strong thesis states both a topic, or general subject matter, and a comment, a claim or original observation about the topic. This thesis states the topic but fails to offer a comment, claim, or observation about it.');

$markup50 = $this->createMarkup('Thesis lacks topic', $user, 'darkorange', 'thesis_lacks_topic', $markupset4, 'http://www.cws.illinois.edu/workshop/writers/tips/thesis/', 'A strong thesis states both a topic, or general subject matter, and a comment, a claim or original observation about the topic. This thesis does not clearly state the topic.');

$markup51 = $this->createMarkup('Thesis development needs work', $user, 'darkorange', 'thesis_development_needs_work', $markupset4, 'http://writingcommons.org/organization/cohesiveness', "All of the claims and evidence presented should relate to or develop the thesis. Here the claims and evidence aren't clearly related to or supportive of the thesis.");

$markup52 = $this->createMarkup('Topic not related to thesis', $user, 'darkorange', 'topic_not_related_to_thesis', $markupset4, 'http://writingcommons.org/organization/cohesiveness', 'How is the topic of this paragraph connected to the thesis? Use transitions and explanations to clarify how the idea in each paragraph is connected to the thesis.');

$markup53 = $this->createMarkup('Topic sentence needs work', $user, 'darkorange', 'topic_sentence_needs_work', $markupset4, 'http://owl.english.purdue.edu/owl/resource/606/1/', 'The topic of this paragraph needs to be clarified.');

$markup54 = $this->createMarkup('Sentence not related to thesis', $user, 'darkorange', 'sentence_not_related_to_thesis', $markupset4, 'http://writingcommons.org/organization/cohesiveness', "All of the claims and evidence presented should relate to or develop the thesis. Here the claims and evidence aren't clearly related to or supportive of the thesis.");

$markupset5 = $this->createMarkupSet('Audience Awareness', 1, $user);

$markup55= $this->createMarkup('Detail inappropriate', $user, 'coral', 'detail_innapropriate', $markupset5, 'http://writingcommons.org/process/think-rhetorically/what-to-think-about-when-writing-for-a-particular-audience', 'This detail is not appropriate for the intended audience. It may confuse or distract your reader.');

$markup56= $this->createMarkup('Diction awkward', $user, 'coral', 'diction_awkward', $markupset5, 'http://writingcommons.org/stylecc/word-choice/661-use-appropriate-academic-language', 'The diction here is unfamiliar or inappropriate for the purpose, context, or audience.');

$markup57= $this->createMarkup('Diction biased', $user, 'coral', 'diction_biased', $markupset5, 'http://owl.english.purdue.edu/owl/resource/608/05/', 'Avoid using stereotypes or other language choices that might communicate an inappropriate bias to your intended audience.');

$markup58= $this->createMarkup('Diction unclear', $user, 'coral', 'diction_ineffective', $markupset5, 'http://owl.english.purdue.edu/owl/resource/608/04/', 'Unless they are used for emphasis or a particular purpose, avoid euphemisms or language that may confuse or deceive the intended audience.');

$markup59= $this->createMarkup('Diction too formal', $user, 'coral', 'diction_too_formal', $markupset5, 'http://owl.english.purdue.edu/owl/resource/608/02/', "Be careful to choose a level of formality appropriate to the purpose, context, and intended audience. Being too formal can be just as damaging to an author's credibility as being too informal.");

$markup60= $this->createMarkup('Avoid technical jargon', $user, 'coral', 'avoid_technical_jargon', $markupset5, 'http://owl.english.purdue.edu/owl/resource/608/03/', 'Jargon and other vocabulary used for specialized audiences should be avoided in writing intended for a more general audience.');

$markup61= $this->createMarkup('Diction too informal', $user, 'coral', 'diction_too_informal', $markupset5, 'http://owl.english.purdue.edu/owl/resource/608/02/', "Be careful to choose a level of formality appropriate to the purpose, context, and intended audience. Being too formal can be just as damaging to an author's credibility as being too informal.");

$markup62= $this->createMarkup('Evidence overly biased', $user, 'coral', 'evidence_overly_biased', $markupset5, 'http://writingcommons.org/evidence/supporting-sources/630-what-might-be-a-more-credible-reliable-source', 'Avoid using evidence that reveals an inappropriate bias.');

$markup63= $this->createMarkup('Expletive construction ineffective', $user, 'coral', 'expletive_construction_ineffective', $markupset5, 'http://owl.english.purdue.edu/owl/resource/572/04/', 'Avoid beginning sentences with "it" or "there" and a form of the verb "to be" (e.g. "It is" or "There are"). Instead, use clear subjects and active verbs.');

$markup64= $this->createMarkup('Linking verb ineffective', $user, 'coral', 'linking_verb_ineffective', $markupset5, 'http://www.cws.illinois.edu/workshop/writers/activevoice/', 'Avoid overuse of "to be" verbs. Choose clear subjects and strong action verbs instead.');

$markup65= $this->createMarkup('Need less explanation', $user, 'coral', 'need_less_explanation', $markupset5, 'http://owl.english.purdue.edu/owl/resource/572/02/', 'Avoid including unnecessary or repetitive detail in explanations. Be concise, and provide only as much information as needed to achieve your purpose with the intended audience.');

$markup66= $this->createMarkup('Be concise', $user, 'coral', 'be_concise', $markupset5, 'http://writingcommons.org/process/edit/97-edit-for-economy', 'In general, concise language is clearer and better at achieving your purpose with the intended audience.');

$markup67= $this->createMarkup('Needs more explanation', $user, 'coral', 'needs_more_explanation', $markupset5, 'http://writingcommons.org/style/description', 'Provide more detail to help your audience understand the point here.');

$markup68= $this->createMarkup('Passive voice ineffective', $user, 'coral', 'passive', $markupset5, 'http://www.cws.illinois.edu/workshop/writers/activevoice/', 'Avoid overuse of "to be" verbs. Choose clear subjects and strong action verbs instead.');

$markup69= $this->createMarkup('Use possessive', $user, 'coral', 'use_possessive', $markupset5, 'http://owl.english.purdue.edu/owl/resource/621/01/', "The possessive is needed here to convey an ownership relation. Create the possessive of nouns by adding an apostrophe + 's' (e.g., 'the dog's bone,' 'Jane's shoe'). Pronouns have distinct forms (e.g., 'his,' 'its,' 'hers,' 'their').");

$markupset6 = $this->createMarkupSet('Top20', 1, $user);

$markup70 = $this->createMarkup('Agr PA', $user, 'aquamarine', 'agr_pa', $markupset6, 'http://www.cws.illinois.edu/workshop/writers/pronounagreement/', 'A plural noun must be replaced by a plural pronoun, a singular noun by a singular pronoun.');

$markup71 = $this->createMarkup('Agr SV', $user, 'aquamarine', 'agr_sv', $markupset6, 'http://ebooks.bfwpub.com/smhandbook7e.php', 'http://owl.english.purdue.edu/owl/resource/599/01/', 'Generally, in formal academic English prose, subjects and verbs must agree in number and person.');

$markup72 = $this->createMarkup('Apostrophe', $user, 'aquamarine', 'apostrophe', $markupset6, 'http://www.writingcommons.org/stylecc/punctuation/529-review-apostrophe-usage-', 'In general, use an apostrophe to form possessives and contractions, not plurals.');

$markup73 = $this->createMarkup('Capitals', $user, 'aquamarine', 'caps', $markupset6, 'http://owl.english.purdue.edu/owl/resource/592/1/', 'Use capital letters generally to indicate the first word of a sentence and proper nouns.');

$markup74 = $this->createMarkup('Comma coordinating', $user, 'aquamarine', 'comma_coordinating', $markupset6, 'http://owl.english.purdue.edu/owl/resource/598/01/', 'Use a comma before the coordinating conjunction (and, but, or, nor, for, so, yet) in a compound sentence.');

$markup75 = $this->createMarkup('Comma ntroductory', $user, 'aquamarine', 'comma_intro', $markupset6, 'http://owl.english.purdue.edu/owl/resource/607/03/', 'Use commas to set off introductory clauses, phrases, and words that begin a sentence.');

$markup76 = $this->createMarkup('Comma non-restrictive', $user, 'aquamarine', 'comma_non_restrictive', $markupset6, 'http://owl.english.purdue.edu/owl/resource/607/05/', 'Clauses, words, and phrases that elaborate but do not change the essential meaning of the sentence should be set off by commas.');

$markup77 = $this->createMarkup('Comma series', $user, 'aquamarine', 'comma_series', $markupset6, 'http://owl.english.purdue.edu/owl/resource/607/01/', 'Use commas to separate nouns in a series.');

$markup78 = $this->createMarkup('Comma splice', $user, 'aquamarine', 'comma_splice', $markupset6, 'http://www.cws.illinois.edu/workshop/writers/fusedsentences/', "Don't use a comma to separate two independent clauses without a coordinating conjunction."); 

$markup79 = $this->createMarkup('Dangling modifier', $user, 'aquamarine', 'dangling_mod', $markupset6, 'http://www.cws.illinois.edu/workshop/writers/danglingmodifiers/', 'A dangling modifier is misplaced in the sentence.');

$markup80 = $this->createMarkup('Fragment', $user, 'aquamarine', 'fragment', $markupset6, 'http://www.cws.illinois.edu/workshop/writers/sentencefragments/', 'To be complete, a sentence must have both a subject and a predicate.');

$markup81 = $this->createMarkup('Fused sentence', $user, 'aquamarine', 'fused', $markupset6,'http://www.cws.illinois.edu/workshop/writers/fusedsentences/', 'Make this into two sentences or into a compound sentence where two independent clauses are joined by a comma and coordinating conjunction, or a semicolon.');

$markup82 = $this->createMarkup('Hyphens', $user, 'aquamarine', 'hyphens', $markupset6, 'http://www.writingcommons.org/stylecc/punctuation/531-review-hyphen-usage-', 'You need a hyphen here.');

$markup83 = $this->createMarkup('Missing word', $user, 'aquamarine', 'missing_word', $markupset6, 'http://www.writingcommons.org/process/edit/812-proofreading', 'A word is needed here for this to make sense. Always make sure to proofread carefully.');

$markup84 = $this->createMarkup('Proofreading', $user, 'aquamarine', 'proof', $markupset6,  'http://www.writingcommons.org/process/edit/812-proofreading', 'This section contains a number of issues that could have been avoided with careful proofreading.');

$markup85 = $this->createMarkup('Pronoun reference', $user, 'aquamarine', 'pronoun_ref', $markupset6, 'http://www.cws.illinois.edu/workshop/writers/pronouns/', "It's hard to tell which preceding noun this pronoun is replacing.");

$markup86 = $this->createMarkup('Quotation integration', $user, 'aquamarine', 'quote_int', $markupset6, 'http://writingcommons.org/evidence/quotations/563-avoid-dropped-quotations-', 'It is good to use direct quotations as evidence, but to be effective the quotation should be introduced with information about its source and followed by a discussion of its relevance to the claim it is offered to support.');

$markup87 = $this->createMarkup('Spelling', $user, 'aquamarine', 'spelling', $markupset6,  'http://www.writingcommons.org/process/edit/812-proofreading', "Always proofread carefully, even when you're using a spell-checker tool.");

$markup88 = $this->createMarkup('Tense shift', $user, 'aquamarine', 'tense', $markupset6, 'http://owl.english.purdue.edu/owl/resource/601/04/', 'Avoid shifting tenses in academic prose except where necessary, for example, to indicate the timing of a sequence of events.');

$markup89 = $this->createMarkup('Wrong word', $user, 'aquamarine', 'wrong_word', $markupset6, 'http://owl.english.purdue.edu/engagement/index.php?category_id=2&sub_category_id=2&article_id=66', "This word seems out of place or doesn't really make sense here as used. Check the definition to get a better understanding of its meaning and connotations.");

$markupset7 = $this->createMarkupSet('Classical Rhetoric', 1, $user);

$markup90 = $this->createMarkup('Ethos', $user, 'darkturquoise', 'ethos', $markupset7, 'http://writingcommons.org/information-literacy/understanding-arguments/rhetorical-analysis/rhetorical-appeals/ethos', 'Rhetorical appeals based on ethos attempt to persuade by establishing the authority or credibility of the author.');

$markup91 = $this->createMarkup('Logos', $user, 'darkturquoise', 'logos', $markupset7, 'http://writingcommons.org/information-literacy/understanding-arguments/rhetorical-analysis/rhetorical-appeals/logos', 'Rhetorical appeals based on logos attempt to persuade by constructing a logical argument consisting of claims that are supported by reliable evidence.');

$markup92 = $this->createMarkup('Pathos', $user, 'darkturquoise', 'pathos', $markupset7, 'http://writingcommons.org/information-literacy/understanding-arguments/rhetorical-analysis/rhetorical-appeals/pathos', 'Rhetorical appeals based on pathos attempt to persuade by arousing strong emotions for or against a point of view or proposition.');

$markupset8 = $this->createMarkupSet('Rhetorical Awareness', 1, $user);

$markup93 = $this->createMarkup('Purpose', $user, 'cyan', 'purpose', $markupset8, 'http://writingcommons.org/process/think-rhetorically/consider-your-purpose', 'Consider what you are trying to accomplish through communicating. The reason for or goal motivating communication is its purpose.');

$markup94 = $this->createMarkup('Context', $user, 'cyan', 'context', $markupset8, 'http://writingcommons.org/process/think-rhetorically/consider-your-context', 'The context for communication includes the social, political, economic, temporal, and historical circumstances within which the communication takes shape.');

$markup95 = $this->createMarkup('Author', $user, 'cyan', 'author', $markupset8, 'http://writingcommons.org/process/think-rhetorically/consider-your-voice-tone-and-persona', 'To communicate effectively requires understanding your own identity as an author and how that identity shapes and is conveyed through the communication process.');

$markup96 = $this->createMarkup('Audience', $user, 'cyan', 'audience', $markupset8, 'http://writingcommons.org/process/think-rhetorically/consider-your-audience', 'Communication should always be designed with a particular audience in mind and with an awareness of multiple potential audiences.');

$markup97 = $this->createMarkup('Media', $user, 'cyan', 'media', $markupset8, 'http://writingcommons.org/process/think-rhetorically/consider-your-media', 'Effective communication involves the strategic use of appropriate media. Some media may be more or less appropriate than others, depending on context, purpose, and audience.');

$markup98 = $this->createMarkup('Mode', $user, 'cyan', 'mode', $markupset8, 'http://www.ncrm.ac.uk/news/show.php?article=5233', "Communication is multimodal, and effective communication demonstrates the author's awareness of how text, sound, visuals, and nonverbal elements work together to convey meaning.");

$markupset9 = $this->createMarkupSet('Claim Evidence Analysis', 1, $user);

$markup99 = $this->createMarkup('Evidence', $user, 'gold', 'evidence', $markupset9, 'http://writingcommons.org/research/integrate-evidence/incorporate-evidence', 'To be persuasive, claims should be supported by reliable evidence.');

$markup100 = $this->createMarkup('Claim', $user, 'gold', 'claim', $markupset9, 'http://writingcommons.org/information-literacy/understanding-arguments/distinguishing-between-main-points-and-sub-claims', 'An argument consists of a series of claims supported by evidence.');

$markup101 = $this->createMarkup('Analysis', $user, 'gold', 'analysis', $markupset9, 'http://writingcommons.org/research/integrate-evidence/incorporate-evidence/analyze-evidence', 'Analysis demonstrates how evidence is connected to thesis and purpose by explaining how the evidence offered supports the claim stated.');

 $manager->persist($markupset1);       
 $manager->persist($markupset2);     
 $manager->persist($markupset3);     
 $manager->persist($markupset4);     
 $manager->persist($markupset5);     
 $manager->persist($markupset6); 
 $manager->persist($markupset7);
 $manager->persist($markupset8);
 $manager->persist($markupset9); 
 
$manager->persist($markup1);
$manager->persist($markup2);
$manager->persist($markup3);
$manager->persist($markup4);
$manager->persist($markup5);
$manager->persist($markup6);
$manager->persist($markup7);
$manager->persist($markup8);
$manager->persist($markup9);
$manager->persist($markup10);

$manager->persist($markup11);
$manager->persist($markup12);
$manager->persist($markup13);
$manager->persist($markup14);
$manager->persist($markup15);
$manager->persist($markup17);
$manager->persist($markup16);
$manager->persist($markup18);
$manager->persist($markup19);
$manager->persist($markup20);

$manager->persist($markup21);
$manager->persist($markup22);
$manager->persist($markup23);
$manager->persist($markup24);
$manager->persist($markup25);
$manager->persist($markup26);
$manager->persist($markup27);
$manager->persist($markup29);


$manager->persist($markup30);
$manager->persist($markup31);
$manager->persist($markup32);
$manager->persist($markup33);
$manager->persist($markup34);
$manager->persist($markup35);
$manager->persist($markup36);
$manager->persist($markup37);
$manager->persist($markup38);
$manager->persist($markup39);
$manager->persist($markup40);

$manager->persist($markup41);
$manager->persist($markup42);
$manager->persist($markup43);
$manager->persist($markup44);
$manager->persist($markup45);
$manager->persist($markup46);
$manager->persist($markup47);
$manager->persist($markup48);
$manager->persist($markup49);

$manager->persist($markup50);
$manager->persist($markup51);
$manager->persist($markup52);
$manager->persist($markup53);
$manager->persist($markup54);
$manager->persist($markup55);
$manager->persist($markup56);
$manager->persist($markup57);
$manager->persist($markup58);
$manager->persist($markup59);
$manager->persist($markup60);
$manager->persist($markup61);
$manager->persist($markup62);
$manager->persist($markup63);
$manager->persist($markup64);
$manager->persist($markup65);
$manager->persist($markup66);
$manager->persist($markup67);
$manager->persist($markup68);
$manager->persist($markup69);
$manager->persist($markup70);
$manager->persist($markup71);
$manager->persist($markup72);
$manager->persist($markup73);
$manager->persist($markup74);
$manager->persist($markup75);
$manager->persist($markup76);
$manager->persist($markup77);
$manager->persist($markup78);
$manager->persist($markup79);
$manager->persist($markup80);
$manager->persist($markup81);
$manager->persist($markup82);
$manager->persist($markup83);
$manager->persist($markup84);
$manager->persist($markup85);
$manager->persist($markup86);
$manager->persist($markup87);
$manager->persist($markup88);
$manager->persist($markup89);
$manager->persist($markup90);
$manager->persist($markup91);
$manager->persist($markup92);
$manager->persist($markup93);
$manager->persist($markup94);
$manager->persist($markup95);
$manager->persist($markup96);
$manager->persist($markup97);
$manager->persist($markup98);
$manager->persist($markup99);


$manager->persist($markup100);
$manager->persist($markup101);

       
$manager->flush();
    
    }
    

    
    private function createMarkupSet($name, $shared, $user)
    {
$markupset = new Markupset();
$markupset->setName($name);
$markupset->setShared($shared);
$markupset->setOwner($user);

return $markupset;
    }
    
    private function createMarkup($name, $user, $color, $value, $markupset, $url=null, $mouseover=null, $linktext=null)
    {
$markup = new Markup();
$markup->setName($name);
$markup->setColor($color);
$markup->setUser($user);
$markup->setValue($value);
$markup->setUrl($url);
$markup->setMouseover($mouseover);
$markup->addMarkupset($markupset);
$markup->setLinktext($linktext);
return $markup;
    }
}


