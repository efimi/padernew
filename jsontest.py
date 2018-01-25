from __future__ import print_function
import simplejson as json
from googleplaces import GooglePlaces, types, lang
import pprint
import re

pp = pprint.PrettyPrinter(indent=4)

# api_key = 'AIzaSyAJ4-7cvzD1FXN2JisaRlTdF3RzfXRUE7o'
api_key = 'AIzaSyCOUNC03eGdEIlkOU6xDHoLeL1E-qb1qg8'
google_places = GooglePlaces(api_key)
# around paderborn
query_result = google_places.radar_search(lat_lng={'lat': 51.71905, 'lng': 8.75439}, keyword='bar', radius=1000)
# id Counter i
i = 1
for place in query_result.places[80:94]:
	# make a random token - for verification
	place.get_details()
	print (place.name)
	outputJson = place.details
	# pp.pprint(outputJson)
	print ('opening_hours' and 'close' and 'open' in str(outputJson))
	# lat = str(outputJson['geometry']['location']['lat'])
	# lng = str(outputJson['geometry']['location']['lng'])
	# # print(('open' in str(outputJson['opening_hours']['periods']))
	# print(lat)
	# print(lng)
	
