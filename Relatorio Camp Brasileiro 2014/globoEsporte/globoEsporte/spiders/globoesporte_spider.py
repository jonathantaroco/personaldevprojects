# -*- coding: utf-8 -*-

from scrapy.contrib.spiders import CrawlSpider, Rule
from scrapy.contrib.linkextractors import LinkExtractor
from globoEsporte.items import GloboEsporteItem

class GloboEsporteSpider(CrawlSpider):
    name = "globoesporte"
    allowed_domains = ["globoesporte.globo.com"]
    start_urls = ["http://globoesporte.globo.com/futebol/brasileirao-serie-a/noticia/plantao.html"]
    rules = [Rule(LinkExtractor(allow=('./noticia/.', )), follow=True, callback='parse_ge')]

    def parse_ge(self, response):
        for comentario in response.xpath('//div[@class="glbComentarios-conteudo-interno"]'):
            item = GloboEsporteItem()
            item['titulo'] = comentario.xpath('//title/text()').extract()
            item['autor'] = comentario.xpath('div/strong/text()').extract()
            item['texto'] = comentario.xpath('p[@class="glbComentarios-texto-comentario"]/text()').extract()
            item['link'] = response.url
            yield item
